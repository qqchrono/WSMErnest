import 'react-native-gesture-handler';
import * as React  from'react';
import {useState, useEffect} from'react';
import { View,Text,Dimensions,StyleSheet} from 'react-native';
import {Avatar,Title,Caption, Drawer} from 'react-native-paper';
import { BarChart } from "react-native-chart-kit";
import { Dropdown } from 'react-native-element-dropdown';

const HomeScreen = () => {
    //usestate
    
    const [user_id,setid] = useState([]);
    const [item,setitem] = useState([]);

    //variable use to store the current selected year , monthly usage 
    var jan=0;
    var feb=0;
    var mar=0;
    var apr=0;
    var may=0;
    var jun=0;
    var jul=0;
    var aug=0;
    var sep=0;
    var oct=0;
    var nov=0;
    var dec=0;
    //import user email from signin.js
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
       setid(Response[0]['id'])
      })
      .catch((error)=>{
        console.error("ERROR FOUND" + error);
      })
    
    }
    //function to retrive user usage 
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
    
    //filter the usage by year , and each month 
    const filter_data=(year) =>{

      for (let i = 0 ; i <item.length ; i++){
        if(item[i]['date'].includes(year+"-01")){
          jan=(item[i]['water_usage'])
        }
        else if((item[i]['date'].includes(year+"-02"))){
          feb=(item[i]['water_usage'])
        }
        else if((item[i]['date'].includes(year+"-03"))){
          mar=(item[i]['water_usage'])
        }
        else if((item[i]['date'].includes(year+"-04"))){
          apr=(item[i]['water_usage'])
        }
        else if((item[i]['date'].includes(year+"-05"))){
          may=(item[i]['water_usage'])
        }
        else if((item[i]['date'].includes(year+"-06"))){
          jun=(item[i]['water_usage'])
        }
        else if((item[i]['date'].includes(year+"-07"))){
          jul=(item[i]['water_usage'])
        }
        else if((item[i]['date'].includes(year+"-08"))){
          aug=(item[i]['water_usage'])
        }
        else if((item[i]['date'].includes(year+"-09"))){
          sep=(item[i]['water_usage'])
        }
        else if((item[i]['date'].includes(year+"-10"))){
          oct=(item[i]['water_usage'])
        }
        else if((item[i]['date'].includes(year+"-11"))){
          nov=(item[i]['water_usage'])
        }
        else if((item[i]['date'].includes(year+"-12"))){
          dec=(item[i]['water_usage'])
        }
      }
    
    }
  //runing the function once , and rerun with condition 
  useEffect(()=>{
    fetch_user_detail()
    if(user_id!=""){
      fetch_current_usage()
    }
  },[user_id])
  
    return (
      
      <View style={styleSheet.MainContainer}>
        {filter_data('2023')}
       
      <View style={styles.userInfoSection}>
        
           <View style={{flexDirection: 'row', marginTop: 15}}>
             <Avatar.Image 
               source={{
                 uri: 'https://www.freeiconspng.com/images/profile-icon-png',
               }}
               size={80}
             />
             <View style={{marginLeft: 20}}>
               <Title style={[styles.title, {
                 marginTop:15,
                 marginBottom: 5,
               }]}>{jan}</Title>
               <Caption style={styles.caption}>@j_doe</Caption>
             </View>
           </View>
         </View>
         <View style={styles.userInfoSection}>
           <View style={styles.row}>
             
             <Text style={{color:"#777777", marginLeft: 20}}>159 Admiralty Dr Singapore</Text>
           </View>
           <View style={styles.row}>
             
             <Text style={{color:"#777777", marginLeft: 20}}>+65 94671281</Text>
           </View>
           <View style={styles.row}>
             
             <Text style={{color:"#777777", marginLeft: 20}}>john_doe@email.com</Text>
           </View>
         </View>
   
         <View style={styles.infoBoxWrapper}>
             <View style={[styles.infoBox, {
               borderRightColor: '#dddddd',
               borderRightWidth: 1
             }]}>
               <Title>$140.50</Title>
               <Caption>Wallet</Caption>
             </View>
             <View style={styles.infoBox}>
               <Title>12</Title>
               <Caption>Bills Unpaid</Caption>
             </View>
         </View>
   
   
   
               <Text style={styles.title}> Water Usage</Text>
                 <BarChart
                   data={{
                     labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                     datasets: [{ data: [jan, feb, mar, apr, may, jun] }],
                     //data {[ "id" : 1 , "month": "jan, "usage": "50 " ]} // 
                   }}
                   width={Dimensions.get('window').width - 10}
                   height={180}
                   yAxisLabel={'$'}
                   chartConfig={{
                     backgroundColor: '#FFFFFF',
                     backgroundGradientFrom: '#EAD9A4',
                     backgroundGradientTo: '#C9EFF7',
                     decimalPlaces: 2,
                     color: (opacity = 255) => '#000000',
                     style: {
                       borderRadius: 12, padding: 10
                     },
                   }}
                 />
                 <BarChart
                   data={{
                     labels: ['Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                     datasets: [{ data: [jul,aug,sep,oct, nov, dec, ] }],
                     //data {[ "id" : 1 , "month": "jan, "usage": "50 " ]} // 
                   }}
                   width={Dimensions.get('window').width - 10}
                   height={180}
                   yAxisLabel={'$'}
                   chartConfig={{
                     backgroundColor: '#FFFFFF',
                     backgroundGradientFrom: '#EAD9A4',
                     backgroundGradientTo: '#C9EFF7',
                     decimalPlaces: 2,
                     color: (opacity = 255) => '#000000',
                     style: {
                       borderRadius: 12, padding: 10
                     },
                   }}
                 />
                 </View>
               
      );
    
    
}

renderHeader = () => (
  <View style={styles.header}>
    <View style={styles.panelHeader}>
      <View style={styles.panelHandle} />
    </View>
  </View>
);


const styleSheet = StyleSheet.create({

    MainContainer: {
      flex: 1,
      alignItems: 'center',
      justifyContent: 'center'
    },
     appButtonContainer: {
      elevation: 8,
      backgroundColor: "#red",
      borderRadius: 10,
      paddingVertical: 30,
      paddingHorizontal: 10
    },
    dropdown: {
    margin: 16,
    height: 50,
    borderBottomColor: 'gray',
    borderBottomWidth: 0.5,
  },
  
}); 

const styles = StyleSheet.create({
container: {
  flex: 1,
},
userInfoSection: {
  paddingHorizontal: 30,
  marginBottom: 25,
},
title: {
  fontSize: 24,
  fontWeight: 'bold',
},
caption: {
  fontSize: 14,
  lineHeight: 14,
  fontWeight: '500',
},
row: {
  flexDirection: 'row',
  marginBottom: 10,
},
infoBoxWrapper: {
  borderBottomColor: '#dddddd',
  borderBottomWidth: 1,
  borderTopColor: '#dddddd',
  borderTopWidth: 1,
  flexDirection: 'row',
  height: 100,
},
infoBox: {
  width: '50%',
  alignItems: 'center',
  justifyContent: 'center',
},
menuWrapper: {
  marginTop: 10,
},
menuItem: {
  flexDirection: 'row',
  paddingVertical: 15,
  paddingHorizontal: 30,
},
menuItemText: {
  color: '#777777',
  marginLeft: 20,
  fontWeight: '600',
  fontSize: 16,
  lineHeight: 26,
},
});
export default HomeScreen