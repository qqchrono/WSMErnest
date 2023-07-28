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
import Logo from '../../../asset/water.jpg';

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
   const [eqbill, seteqbill] = useState([]);
   const [selectedeq, setselectedeq] = useState([]);
   const [plantype, setplantype] = useState([]);
  
  const isFocused = useIsFocused()
   var billinformation=[];
   var billid= 5;
   var billdate="";
   var duedate="";
   var usage = "";
   var price_rate="";
   var htmlTemplate="";
   var total_price=0;
   var producthtml="";
   var usagehtml="";
   //this this variable are for discounted plan 
   var offpeakrate=0;
   var peakrate=0;
   var peakusage=0;
   var offpeakusage=0;
   var gst=0;
  
  //user email
   var Email = require('../SignIn/Signin.js');
    //fetching user detail from database 

    const fetch_user_detail=()=>{
      var APIURL = "http://159.223.83.53/mobile/fetch_user_detail.php";
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
       setplantype(Response[0]['customerPlanType'])
       
       
      })
      .catch((error)=>{
        console.error("ERROR FOUND" + error);
      })
    
  }
  //fectch user usage
   const fetch_current_usage=()=>{
      var APIURL = "http://159.223.83.53/mobile/fetch_user_usage.php";
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
      
        
        setwaterusagebill(Response)
       setIsLoading(false)
      })
      .catch((error)=>{
        console.error("ERROR FOUND" + error);
      })
    }

    //fetch price rate based on the month/year
    const fetch_price_rate=()=>{
      var APIURL = "http://159.223.83.53/mobile/fetch_price_rate.php";
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
    //fetch equipment/chemicals used for service bill 
    const fetch_eqbill=()=>{
      var APIURL = "http://159.223.83.53/mobile/fetch_eqbill.php";
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
        seteqbill(Response)

      })
      .catch((error)=>{
        console.error("ERROR FOUND" + error);
      })
    }
//connecting with the bank to verify payment
const verify_bank=()=>{
  var APIURL = "http://159.223.83.53/mobile/validate_bank.php";
  var headers = {
    'Accept' : 'application/json',
    'Content-Type' : 'application/json'
  };
  var Data ={
    total_price:(total_price+(total_price*(gst/100))).toFixed(2),
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
  
  for(let i=0 ; i<waterusagebill.length;i++){
    //console.log(id);
    
    //check bill belong to the usage , show different company too , but pricerate will based on the company 

    if(waterusagebill[i]["waterUsageID"]==id){
        total_price=0;
        billid=id;
        htmlTemplate="";
        usagehtml="";
        billdate=waterusagebill[i]['billDate']
        duedate=waterusagebill[i]['dueDate']
        usage = waterusagebill[i]['waterUsage']
        peakusage=waterusagebill[i]['peakusage']
        offpeakusage=waterusagebill[i]['offpeakusage']
        billcompanyUEN=waterusagebill[i]['companyUEN']
        filterBillDate=billdate.slice(0,7).replace('-','');
        //check if any previous month service bill incur, if it does , add the usage into the current month
        if(eqbill!=null){
        for(let j=0;j<eqbill.length;j++){
          //change the billdate year month by 1month behind
          eqbillDate= eqbill[j]['date']
          filtereqbillDate=(eqbillDate.slice(0,7).replace('-',''));
          productprice=0;
          filterdate=getPreviousMonth(billdate)
          filterdate=filterdate.slice(0,7).replace('-','');
          //getPreviousMonth(filterBillDate)
          //if the year and month match , charge the service bill into this month
          if(filtereqbillDate==filterdate){
            //eqbillarray.push(eqbill[i]);
            //check if the eqbill type is chemical or equipment , then assign the price
            productprice=eqbill[j]["priceRate"];
            total_price=total_price+(productprice*eqbill[j]["quantity"]);
            producthtml += "<tr><td>"+eqbill[j]["date"]+"</td><td>"+eqbill[j]["productName"]+"</td><td>"+eqbill[j]["quantity"]+"</td><td>$"+productprice+"/unit</td><td>$"+(productprice*eqbill[j]["quantity"])+"</td></tr>";
          }
        }
        }
        //assign price rate by filtering the date 
        if(rate!=null){
          
        for(let k=0;k<rate.length;k++){
          filterPriceDate=(rate[k]['priceDate']).slice(0,7).replace('-','');
          //check which price rate does this bill assign to and from the company 
          
          if(filterPriceDate==filterBillDate && rate[k]['companyUEN']==billcompanyUEN){
            gst=rate[k]['gst']
            //check customer plan type regular/offregular
            
            if(plantype=="regular"){
              price_rate=rate[k]['waterPriceRate']
              total_price=total_price+(price_rate*usage);
              usagehtml += "<tr><td>"+billdate+"</td><td>regular Traffic rate</td><td>"+usage+"</td><td>$"+(price_rate)+"/mL</td><td>$"+(price_rate*usage).toFixed(2)+"</td></tr>";
            }
            else{
             
              offpeakrate=rate[k]['offPeakwaterPriceRate'];
              peakrate=rate[k]['peakWaterPriceRate'];
            
              total_price=total_price+(offpeakrate*offpeakusage);
              total_price=total_price+(peakrate*peakusage);
              usagehtml += "<tr><td>"+billdate+"</td><td>Off Peak Traffic rate</td><td>"+offpeakusage+"</td><td>$"+(offpeakrate)+"/mL</td><td>$"+(offpeakrate*offpeakusage).toFixed(2)+"</td></tr>";
              usagehtml += "<tr><td>"+billdate+"</td><td>Peak Traffic rate</td><td>"+peakusage+"</td><td>$"+(peakrate)+"/mL</td><td>$"+(peakrate*peakusage).toFixed(2)+"</td></tr>";
            }
          }
        }
      }
    }
  }

}



   //generate pdf 
   async function generatePDF(id){
      
      const check =await setdata(id)
      //set pdf html template with data selected
      //console.log(producthtml);
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
    .tt tr.horizontal-line-row td {
      border-bottom: 1px solid black;
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
    <img src="http://159.223.83.53/mobile/12water.jpg" alt="Company Logo" width="100">
  </div>

  <h1>            </h1>

  <div class="top-right">
    <h2>${billdate} Tax Invoice</h2>
  </div>

  <table style="width: 30%" align="right" >
    <thead>
      <tr>
        <th bgcolor="grey">Total Amount Payable</th>
        <th bgcolor="grey">$${((total_price*(gst/100))+total_price).toFixed(2)}</th>
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
        <td>Subcription Plan Type</td>
        <td>${plantype}</td>
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
        <th>Product Name/Traffic type</th>
        <th>Usage</th>
        <th>Rate</th>
        <th>Amount($)</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
    ${usagehtml}
      ${producthtml}
        <tr >
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td >$${(total_price).toFixed(2)}</td>
          
          
        </tr>
     
        <tr>
            <td>Total Current Charges(Taxable)</td>
            <td></td>
            <td></td>
            <td></td>
            <td>$${(total_price).toFixed(2)}</td>
            <td></td>
        </tr>
       
        <tr>
            <td>GST ${gst}%</td>
            <td></td>
            <td></td>
            <td></td>
            <td>$${(total_price*(gst/100)).toFixed(2)}</td>
            <td></td>
        </tr>
       
        <tr>
            <td>Total Current Charges (incl. of GST)</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>$${((total_price*(gst/100))+total_price).toFixed(2)}</td>
        </tr>
        

    </tbody>
  </table>

  <p>Thank you for your payment.</p>
</body>
</html>
`;

        
      alert("Bill Has been downloaded")
      const htmlContent =  htmlTemplate;
    
      let options = {
         html: htmlContent,
         fileName: billdate+name,
         directory:"Downloads",
         base64: true,
      };
      const file = await RNHTMLtoPDF.convert(options);
      console.log(file.filePath);
      total_price=0;
      producthtml="";
      price_rate=0;
   }

   
   //fetch ticket when it is forced deal with navigation error
 useEffect(() => {
  if(isFocused){
    fetch_current_usage()
    fetch_user_detail()
    fetch_price_rate()
    fetch_eqbill()
   
  }
  if(refreshIndicator){
    fetch_current_usage()
    fetch_user_detail()
    fetch_price_rate()
    fetch_eqbill()
  
    setRefreshIndicator(false);
  }
 
}, [isFocused,refreshIndicator])

// this help to fetch previous month
function getPreviousMonth(dateString) {
  var currentDate = new Date(dateString);
  var year = currentDate.getFullYear();
  let month = currentDate.getMonth();

  // Handle January (month 0) separately
  if (month === 0) {
    month = 11; // December (month 11)
    year -= 1; // Go back to the previous year
  } else {
    month -= 1; // Go back to the previous month
  }

  // Pad month with leading zero if necessary
  const formattedMonth = String(month + 1).padStart(2, '0');

  // Construct the previous month's date string
  const previousMonth = `${year}-${formattedMonth}-${currentDate.getDate()}`;
  return previousMonth;
}

    if(!isLoading){
      
      //validate if there a bill
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

    <Title style={[styles.title]}>Download and View Bills</Title>
 
        
      
      

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
    height: 90,
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
    padding: 0,
    alignItems: 'center',
   justifyContent: 'center',
    borderColor: '#fff',
    borderWidth: 0,
    borderLeftWidth: 0,
    borderBottomLeftRadius: 25,
    borderTopLeftRadius: 25,
    backgroundColor: '#7796cb',
    marginLeft: 20,
  },
  cardTitle: {
    fontWeight: 'bold',
    color: 'black',
  },
  cardDetails: {
    fontSize: 12,
    color: 'black',
    paddingVertical: 0.5,
  },
  button: {

   alignItems: 'center',
   justifyContent: 'center',
   marginRight: 20,
   
   paddingVertical: 20,
   paddingHorizontal: 32,
   backgroundColor: '#7796cb',
   borderBottomRightRadius: 25,
   borderTopRightRadius: 25,
  
   
 },
 title: {
  textAlign: 'center',
  fontWeight: 'bold',
  marginTop:15,
  marginBottom: 5,
  fontSize:20,
  fontWeight:'700',
  

 },
  });