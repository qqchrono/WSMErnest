import * as React from 'react';
import { Button, 
  Text, 
  View,  
  StyleSheet, 
  ScrollView, 
  Alert,} from 'react-native';
import RNHTMLtoPDF from 'react-native-html-to-pdf';
import {useState, useEffect} from'react';
import {
  Avatar,
  Title,
  Caption,
  TouchableRipple,
} from 'react-native-paper';
import { useNavigation ,useIsFocused} from "@react-navigation/native";
  
export default function BillScreen()  {
  const [refreshIndicator, setRefreshIndicator] = useState(false);
   var user_id = require('../HomeScreen/HomeScreen');
   const navigation =useNavigation();
   const [waterusagebill,setwaterusagebill] = useState([]);
   const [name,setname] = useState([]);
   const [phone,setphone] = useState([]);
   const [address,setaddress] = useState([]);
   const [accountnumber,setaccountnumber] = useState([]);
   const [isLoading, setIsLoading] = useState(true);
   const [rate, setrate] = useState([]);
  const isFocused = useIsFocused()
   var billinformation=[];
   var billid= 5;
   var billdate="";
   var duedate="";
   var usage = "";
   var price_rate="";
   var htmlTemplate="";
   var total_price="";
   //this this variable are for discounted plan 
   var offpeakrate="";
   var peakrate=""
   //
  //user email
   var Email = require('../SignIn/Signin.js');
    //fetching user detail from database 

    const fetch_user_detail=()=>{
      var APIURL = "http://10.0.2.2/mobile/fetch_user_detail.php";
      var headers = {
        'Accept' : 'application/json',
        'Content-Type' : 'application/json'
      };
      var Data ={
        Email: Email,
      };
      fetch(APIURL,{
        method: 'POST',
        headers: headers,
        body: JSON.stringify(Data)
      })
      .then((Response)=>Response.json())
      .then((Response)=>{
       setphone(Response[0]['phoneNumber'])
       setaddress(Response[0]['address'])
       setname(Response[0]['customerName'])
       setaccountnumber(Response[0]['bankAccount'])
       
       
      })
      .catch((error)=>{
        console.error("ERROR FOUND" + error);
      })
    
  }
  //fectch user usage
   const fetch_current_usage=()=>{
      var APIURL = "http://10.0.2.2/mobile/fetch_user_usage.php";
      var headers = {
        'Accept' : 'application/json',
        'Content-Type' : 'application/json'
      };
      var Data ={
        user_id: user_id,
      };
      fetch(APIURL,{
        method: 'POST',
        headers: headers,
        body: JSON.stringify(Data)
      })
  
      .then((Response)=>Response.json())
      .then((Response)=>{
        setwaterusagebill(Response)
       setIsLoading(false)
      })
      .catch((error)=>{
        console.error("ERROR FOUND" + error);
      })
    }

    //fetch price rate based on the month/year
    const fetch_price_rate=()=>{
      var APIURL = "http://10.0.2.2/mobile/fetch_price_rate.php";
      var headers = {
        'Accept' : 'application/json',
        'Content-Type' : 'application/json'
      };
      
      fetch(APIURL,{
        method: 'POST',
        headers: headers,
        body: JSON.stringify()
      })
  
      .then((Response)=>Response.json())
      .then((Response)=>{
        setrate(Response)

      })
      .catch((error)=>{
        console.error("ERROR FOUND" + error);
      })
    }
//connecting with the bank to verify payment
const verify_bank=()=>{
  var APIURL = "http://10.0.2.2/mobile/validate_bank.php";
  var headers = {
    'Accept' : 'application/json',
    'Content-Type' : 'application/json'
  };
  var Data ={
    total_price:total_price,
    bankAccount:accountnumber,
    billid:billid,
  };
  fetch(APIURL,{
    method: 'POST',
    headers: headers,
    body: JSON.stringify(Data)
  })

  .then((Response)=>Response.json())
  .then((Response)=>{
    alert(Response)
    console.log(Response)
  })
  .catch((error)=>{
    console.error("ERROR FOUND" + error);
  })
}

//verify payment after use click on paybill
const payment_verify=(id)=>{
  setdata(id)
  verify_bank();
  setRefreshIndicator(true);

}

//set data that are use for the pdf after user select the bill he/she which to review 
async function setdata(id){
  
  for(i=0 ; i<waterusagebill.length;i++){
    if(waterusagebill[i]["waterUsageID"]==id){
        billid=id
        billdate=waterusagebill[i]['billDate']
        duedate=waterusagebill[i]['dueDate']
        usage = waterusagebill[i]['waterUsage']
        //assign price rate by filtering the date 
        for(i=0;i<rate.length;i++){
          filterPriceDate=(rate[i]['priceDate']).slice(0,7).replace('-','');
          filterBillDate=billdate.slice(0,7).replace('-','');
          if(filterPriceDate==filterBillDate){
            price_rate=rate[i]['waterPriceRate']
            total_price=price_rate*usage
          }
        }
    }
  }

}


   //generate pdf 
   async function generatePDF(id){
      
      setdata(id)
      //set pdf html template with data selected
      htmlTemplate = `
   <!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h1 {
      font-size: 24px;
      text-align: center;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
     
    }

    th, td {
        text-align:left;
      padding: 8px;
      border-bottom: 1px solid #ddd;
      border: 1px solid black;
    }

    .bill-details {
      margin-bottom: 20px;
    }

    .bill-details span {
      font-weight: bold;
    }

    .logo {
      float: left;
      margin-right: 20px;
    }

    .top-right {
      position: absolute;
      top: 0;
      right: 0;
      text-align: right;
    }
    .tt th, .tt td {
        border: hidden;
    }
    
  </style>
</head>
<body>
  <div class="logo">
    <img src="http://10.0.2.2/mobile/water.jpg" alt="Company Logo" width="100">
  </div>

  <h1>            </h1>

  <div class="top-right">
    <h2>${billdate} Tax Invoice</h2>
  </div>

  <table style="width: 30%" align="right" >
    <thead>
      <tr>
        <th bgcolor="grey">Total Amount Payable</th>
        <th bgcolor="grey">$${total_price}</th>
      </tr>
    </thead>
    <br>
    <br>
    <br>
    <tbody>
      <tr>
        <td>Payment Due date</td>
        <td>${duedate}</td>
      </tr>
      <tr>
        <td>Payment Mode</td>
        <td>BankPayment</td>
      </tr>
    </tbody>
  </table>
<br>
  <div class="bill-details">
  <br>
    <span>Customer Name:</span> ${name}<br>
    <span>Account Number:</span> ${accountnumber}<br>
    <span>Bill Number:</span> ${billid}<br>
    <span>Bill Date:</span> ${billdate}<br>
    <span>Address:</span> ${address} <br>
  </div>

  <table class="tt" >
    <thead>
      <tr bgcolor="grey">
        <th>Break of current Charges</th>
        <th>Usage</th>
        <th>Rate</th>
        <th>Amount($)</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>10-04-2023 - 10-05-2023</td>
        <td>${usage}</td>
        <td>${price_rate}¢/unit</td>
        <td>$${total_price}</td>
      </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>$${total_price}</td>
        </tr>
    </tbody>
  </table>

  <p>Thank you for your payment.</p>
</body>
</html>
`;

        
      alert("Bill Has been downloaded")
      const htmlContent = htmlTemplate;
    
      let options = {
         html: htmlContent,
         fileName: billdate,
         directory:"Downloads",
         base64: true,
      };
      const file = await RNHTMLtoPDF.convert(options);
      console.log(file.filePath);
      
   }


   //fetch ticket when it is forced deal with navigation error
 useEffect(() => {
  if(isFocused){
    fetch_current_usage()
    fetch_user_detail()
    fetch_price_rate()
  }
  if(refreshIndicator){
    fetch_current_usage()
    fetch_user_detail()
    fetch_price_rate()
    setRefreshIndicator(false);
  }
 
}, [isFocused,refreshIndicator])


   
    if(!isLoading){
      
      //validate if there a ticket fetch 
      if(waterusagebill.length>0 ){
        var billstates=""
      for (i =0; i <waterusagebill.length ;i++){
        if (waterusagebill[i]["billStatus"]==0){
          billstates="Unpaid"
        }
        else{
          billstates="Paid"
        }
          billinformation.push(
            {waterbillid:waterusagebill[i]["waterUsageID"],
            billStatus:billstates,
            billdate:waterusagebill[i]["billDate"]},
          )
      }
    }
   
   
   return (
      
    <ScrollView style={styles.container}>

    <Title style={[styles.title, {
          marginTop:15,
          marginBottom: 5,
          marginLeft: 90,
          fontSize:20,
          fontWeight:'700',
        }]}>Download and View Bills</Title>
 
        
      
      

      {billinformation.map((billinformation) => { //This loop calls all the data in the array billinformation and prints it out 
    return (
    <View key={billinformation.waterbillid}style={styles.card}>
      <View style={styles.cardInfo}>
        <Text style={styles.cardTitle}>
          Bill Id:
        {billinformation.waterbillid}
        </Text>
        <Text style={styles.cardDetails}>
          Date:
          {billinformation.billdate}
        {}
        </Text>
        <Text style={styles.cardDetails}>
          Bill Status:{billinformation.billStatus}
        </Text>
      </View>
           <View style={styles.button}>
                 <Button
                 title="       Pay Bill        "
                 color="#1666BE"
                 disabled={(billinformation.billStatus=="Paid")}
                 onPress={() => payment_verify(billinformation.waterbillid)} //insert  pay function here
                 //Pay function will update the SQL billStatus, and it will then disable the button after it has been paid
                 
              />

              <Button
                 
                 title="Download Bill"
                 color="#092A5B"
                 onPress={() => generatePDF(billinformation.waterbillid)} //insert download function here
              />
              </View>


     </View>

    ); //End of loop below
  })} 
</ScrollView>


);

}
}
 
   const styles = StyleSheet.create({

    container: {
      flex: 1,
    },
  
    sliderContainer: {
      height: 200,
      width: '90%',
      marginTop: 10,
      justifyContent: 'center',
      alignSelf: 'center',
      borderRadius: 8,
    },
  
    wrapper: {},
  
    slide: {
      flex: 1,
      justifyContent: 'center',
      backgroundColor: 'transparent',
      borderRadius: 8,
    },
    sliderImage: {
      height: '100%',
      width: '100%',
      alignSelf: 'center',
      borderRadius: 8,
    },
    categoryContainer: {
      flexDirection: 'row',
      width: '90%',
      alignSelf: 'center',
      marginTop: 25,
      marginBottom: 10,
    },
    categoryBtn: {
      flex: 1,
      width: '30%',
      marginHorizontal: 0,
      alignSelf: 'center',
    },
    categoryIcon: {
      borderWidth: 0,
      alignItems: 'center',
      justifyContent: 'center',
      alignSelf: 'center',
      width: 70,
      height: 70,
      backgroundColor: '#fdeae7' /* '#FF6347' */,
      borderRadius: 50,
    },
    categoryBtnTxt: {
      alignSelf: 'center',
      marginTop: 5,
      color: '#de4f35',
    },
    cardsWrapper: {
      marginTop: 20,
      width: '90%',
      alignSelf: 'center',
    },
    card: {
      height: 80,
      marginVertical: 10,
      flexDirection: 'row',
      shadowColor: '#999',
      shadowOffset: {width: 0, height: 0},
      shadowOpacity: 0,
      shadowRadius: 0,
      elevation: 0,
    },
    cardImgWrapper: {
      flex: 1,
    },
    cardImg: {
      height: '100%',
      width: '100%',
      alignSelf: 'center',
      borderRadius: 8,
      borderBottomRightRadius: 0,
      borderTopRightRadius: 0,
      //borderTopLeftRadius: 15,
  
    },
    cardInfo: {
      flex: 2,
      padding: 10,
      borderColor: '#ccc',
      borderWidth: 0,
      borderLeftWidth: 0,
      borderBottomRightRadius: 8,
      borderTopRightRadius: 8,
      backgroundColor: '#fff',
    },
    cardTitle: {
      fontWeight: 'bold',
      color: '#444',
    },
    cardDetails: {
      fontSize: 12,
      color: '#444',
    },
    button: {
  
     alignItems: 'center',
     justifyContent: 'center',
     paddingVertical: 12,
     paddingHorizontal: 32,
     borderRadius: 4,
     elevation: 3,
     backgroundColor: 'white',
     borderColor: 'black',
     borderWidth: 0,
     borderLeftWidth: 0,
     borderBottomRightRadius: 8,
     borderTopRightRadius: 8,
     
   },
  });