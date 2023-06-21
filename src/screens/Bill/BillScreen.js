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
   var user_id = require('../HomeScreen/HomeScreen');
   const [waterusagebill,setwaterusagebill] = useState([]);
   const [userinform,setuserinform] = useState([]);
   const [isLoading, setIsLoading] = useState(true);
   const [rate, setrate] = useState([]);
    const isFocused = useIsFocused()
   var billinformation=[];
   const k="55"
   const billid= 0;
   const name="";
   const accountnumber="";
   const billdate="";
   const address ="";
   const usage = "";
   const duedate="";
   

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

   //template for pdf 
   const htmlTemplate = `
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
    <h2>February 2023 Tax Invoice</h2>
  </div>

  <table style="width: 30%" align="right" >
    <thead>
      <tr>
        <th bgcolor="grey">Total Amount Payable</th>
        <th bgcolor="grey">$999.0</th>
      </tr>
    </thead>
    <br>
    <br>
    <br>
    <tbody>
      <tr>
        <td>Payment Due date</td>
        <td>19 apir 2022</td>
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
    <span>Customer Name:</span> John Doe<br>
    <span>Account Number:</span> ${k}<br>
    <span>Bill Number:</span> 987654321<br>
    <span>Bill Date:</span> 2023-06-11<br>
    <span>Address:</span> BLK KKK <br>
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
        <td>500</td>
        <td>$10/unit</td>
        <td>$500.00</td>
      </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>$500.00</td>
        </tr>
    </tbody>
  </table>

  <p>Thank you for your payment.</p>
</body>
</html>

   
`;


async function setdata(id){
  
  for(i=0 ; waterusagebill.length;i++){
    if(waterusagebill[i]['waterUsageID']==id){

    }
  }

}


   //generate pdf 
   async function generatePDF(id){
      //setdata(id)
      
      alert("Bill Has been downloaded")
      const htmlContent = htmlTemplate;
   
      const options = {
         html: htmlContent,
         filename: "example",
         directory:"",
      };
      const file = await RNHTMLtoPDF.convert(options);
      console.log(file.filePath);
      
   }


   

   //fetch ticket when it is forced deal with navigation error
 useEffect(() => {
  if(isFocused){
    fetch_current_usage()
    
  }
}, [isFocused])


   
    if(!isLoading){
      
      //validate if there a ticket fetch 
      if(waterusagebill.length>0 ){
      for (i =0; i <waterusagebill.length ;i++){
        billinformation.push(
          {waterbillid:waterusagebill[i]["waterUsageID"],
          billStatus:waterusagebill[i]["billStatus"]},
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
        {billinformation.waterbillid}
        </Text>
        
        <Text style={styles.cardDetails}>
          {billinformation.billStatus}
        </Text>
      </View>
           <View style={styles.button}>
                 <Button
                 title="       Pay Bill        "
                 color="#1666BE"
                 disabled={billinformation.billStatus === "Paid"}
                 onPress={() => Alert.alert('Bill has been paid!')} //insert  pay function here
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