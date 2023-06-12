import * as React from 'react';
import { View, Text ,TouchableOpacity,styles} from "react-native";
import RNHTMLtoPDF from 'react-native-html-to-pdf';
import {useState, useEffect} from'react';


export default function BillScreen()  {
   var user_id = require('../HomeScreen/HomeScreen');
   const [item,setitem] = useState([]);
   const [usage,setusage] = useState([]);
   const [date,setdate] = useState([]);
   var totalbill=[];
   const k="55"

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
       setitem(Response)
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
    <img src="https://example.com/company-logo.png" alt="Company Logo" width="100">
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
   //generate pdf 
   async function generatePDF(){
      
      const htmlContent = htmlTemplate;
   
      const options = {
         html: htmlContent,
         filename: "example",
         directory:"",
      };
      const file = await RNHTMLtoPDF.convert(options);
      console.log(file.filePath);
   }


   const count_bil=()=>{
      console.log("hi")
         for (i =0; i<item.length;i++){
            totalbill.push(
               <View>
                  <Text>{item[i]["waterUsageID"]}</Text>
               </View>
            )
         }
   }
   

   useEffect(()=>{
        fetch_current_usage()
        count_bil()
        
    },[]);
   
   
   
   
   
   return (
      
   <View style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}>
      {totalbill}
   <Text style={{fontSize:16,fontWeight:'700'}}>Refer Screen</Text>
   <TouchableOpacity onPress={() => generatePDF()}> 
            <Text >
            Submit
            </Text>
         </TouchableOpacity>
   </View>
   );
   }
 
