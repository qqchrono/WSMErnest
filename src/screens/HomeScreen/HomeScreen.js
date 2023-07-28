import 'react-native-gesture-handler';
import * as React  from'react';
import {useState, useEffect} from'react';
import { View,Text,Dimensions,StyleSheet} from 'react-native';
import {Avatar,Title,Caption, Drawer} from 'react-native-paper';
import { BarChart } from "react-native-chart-kit";
import { useIsFocused} from "@react-navigation/native";
import AsyncStorage from '@react-native-async-storage/async-storage';
import SelectDropdown from 'react-native-select-dropdown';
import { VictoryChart, VictoryBar, VictoryTheme, VictoryAxis } from 'victory-native';
import { ScrollView } from 'react-native-gesture-handler';

const HomeScreen = () => {
    //usestate
    const isFocused = useIsFocused()
    const [user_id,setid] = useState([]);
    const [item,setitem] = useState([]);
    const [address,setadd]= useState([]);
    const [phone,setphone]=useState([]);
    const [name,setname]= useState([]);
    const [bankAccount,setaccountnumber]= useState([]);
    const [counter,setcounter]= useState(0);
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
    
    const [January, setJanuary]= useState(0);
    const [Febuary, setFebuary]= useState(0);
    const [March, setMarch]= useState(0);
    const [April, setApril]= useState(0);
    const [May, setMay]= useState(0);
    const [June, setJune]= useState(0);
    const [July, setJuly]= useState(0);
    const [August, setAugust]= useState(0);
    const [September, setSeptember]= useState(0);
    const [October, setOctober]= useState(0);
    const [November, setNovember]= useState(0);
    const [December, setDecember]= useState(0);
    //import user email from signin.js
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
       setid(Response[0]['customerID'])
       setphone(Response[0]['phoneNumber'])
       setadd(Response[0]['address'])
       setname(Response[0]['customerName'])
       setaccountnumber(Response[0]['bankAccount'])
       AsyncStorage.setItem('companyUEN', (Response[0]['companyUEN']).toString())
       AsyncStorage.setItem('username', (Response[0]['customerName']).toString())
       module.exports = user_id;
      
       
      })
      .catch((error)=>{
        console.error("ERROR FOUND" + error);
      })
    
    }
    //function to retrive user usage 
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
       setitem(Response)
      
      })
      .catch((error)=>{
        console.error("ERROR FOUND" + error);
      })
    }
    
    //filter the usage by year , and each month 
    const filter_data=(year) =>{

      for (let i = 0 ; i <item.length ; i++){
        if(item[i]['billDate'].includes(year+"-01")){
          jan=(item[i]['waterUsage'])
        }
        else if((item[i]['billDate'].includes(year+"-02"))){
          feb=(item[i]['waterUsage'])
        }
        else if((item[i]['billDate'].includes(year+"-03"))){
          mar=(item[i]['waterUsage'])
        }
        else if((item[i]['billDate'].includes(year+"-04"))){
          apr=(item[i]['waterUsage'])
        }
        else if((item[i]['billDate'].includes(year+"-05"))){
          may=(item[i]['waterUsage'])
        }
        else if((item[i]['billDate'].includes(year+"-06"))){
          jun=(item[i]['waterUsage'])
        }
        else if((item[i]['billDate'].includes(year+"-07"))){
          jul=(item[i]['waterUsage'])
        }
        else if((item[i]['billDate'].includes(year+"-08"))){
          aug=(item[i]['waterUsage'])
        }
        else if((item[i]['billDate'].includes(year+"-09"))){
          sep=(item[i]['waterUsage'])
        }
        else if((item[i]['billDate'].includes(year+"-10"))){
          oct=(item[i]['waterUsage'])
        }
        else if((item[i]['billDate'].includes(year+"-11"))){
          nov=(item[i]['waterUsage'])
        }
        else if((item[i]['billDate'].includes(year+"-12"))){
          dec=(item[i]['waterUsage'])
        }
      }
    
    }
  //runing the function once , and rerun with condition 
  //when page is focused, page will rerun the function to fetch the data 
 useEffect(() => {
  if(isFocused){
    fetch_user_detail()
    if(user_id!=""){
      fetch_current_usage()
      
    }
    //check for number of unpaid bill
    if(item!=null){
      var count=0;
      for (let i = 0 ; i <item.length ; i++){
        
        if(item[i]['billStatus']==0){
          count=count+1;
        }
      }
      setcounter(count)
    }
    
  }
}, [isFocused,user_id,item])

const waterData = {
  2021: [
    { month: 'Jan', usage: January },
    { month: 'Feb', usage: Febuary },
    { month: 'Mar', usage: March },
    { month: 'Apr', usage: April },
    { month: 'May', usage: May },
    { month: 'Jun', usage: June },
    { month: 'Jul', usage: July },
    { month: 'Aug', usage: August },
    { month: 'Sep', usage: September },
    { month: 'Oct', usage: October },
    { month: 'Nov', usage: November },
    { month: 'Dec', usage: December },
    // ... rest of the months
  ],
  2022: [
    { month: 'Jan', usage: January },
    { month: 'Feb', usage: Febuary },
    { month: 'Mar', usage: March },
    { month: 'Apr', usage: April },
    { month: 'May', usage: May },
    { month: 'Jun', usage: June },
    { month: 'Jul', usage: July },
    { month: 'Aug', usage: August },
    { month: 'Sep', usage: September },
    { month: 'Oct', usage: October },
    { month: 'Nov', usage: November },
    { month: 'Dec', usage: December },
    // ... rest of the months
  ],

  2023: [
    { month: 'Jan', usage: January },
    { month: 'Feb', usage: Febuary },
    { month: 'Mar', usage: March },
    { month: 'Apr', usage: April },
    { month: 'May', usage: May },
    { month: 'Jun', usage: June },
    { month: 'Jul', usage: July },
    { month: 'Aug', usage: August },
    { month: 'Sep', usage: September },
    { month: 'Oct', usage: October },
    { month: 'Nov', usage: November },
    { month: 'Dec', usage: December },
    // ... rest of the months
  ],
  // ... rest of the years
};

const years = Object.keys(waterData);

  const [selectedYear, setSelectedYear] = useState(years[0]);

  const data = waterData[selectedYear];

  const handleYearChange = (year) => {
    setSelectedYear(year);
    
    filter_data(year);
    
    setJanuary(parseInt(jan));
    setFebuary(parseInt(feb));
    setMarch(parseInt(mar));
    setApril(parseInt(apr));
    setMay(parseInt(may));
    setJune(parseInt(jun));
    setJuly(parseInt(jul));
    setAugust(parseInt(aug));
    setSeptember(parseInt(sep));
    setOctober(parseInt(oct));
    setNovember(parseInt(nov));
    setDecember(parseInt(dec));

  
  
  };



    return (
      <ScrollView>
      <View style={styleSheet.MainContainer}>
    
       
      <View style={styles.userInfoSection}>
        
           <View style={{flexDirection: 'row', marginTop: 15}}>
             <Avatar.Image 
               source={{
                uri: 'https://image.shutterstock.com/image-photo/portrait-smiling-red-haired-millennial-260nw-1194497251.jpg',
               }}
               size={80}
             />
             </View>
             <View style={{marginLeft: 20}}>
               <Title style={[styles.title, {
                 marginTop:10,
                 marginBottom: 0,
               }]}>{name}</Title>
             </View>
          
         </View>
         <View style={styles.userInfoSection}>
           <View style={styles.row}>
             
             <Text style={{color:"#777777", marginLeft: 20}}>Address: {address}</Text>
           </View>
           <View style={styles.row}>
             
             <Text style={{color:"#777777", marginLeft: 20}}>Phone: {phone}</Text>
           </View>
           <View style={styles.row}>
             
             <Text style={{color:"#777777", marginLeft: 20}}>Email: {Email}</Text>
           </View>
         </View>
   
         <View style={styles.infoBoxWrapper}>
             <View style={[styles.infoBox, {
               borderRightColor: '#dddddd',
               borderRightWidth: 1
             }]}>
               <SelectDropdown
        data={years}
        defaultValue={selectedYear}
        onSelect={handleYearChange}
        buttonTextAfterSelection={(selectedItem) => {
          // Display the selected year in the dropdown button
          return selectedItem;
        }}
        rowTextForSelection={(item) => {
          // Display each year in the dropdown options
          return item;
        }}
      />
               <Caption>Select Year</Caption>
             </View>
             <View style={styles.infoBox}>
               <Title>{counter}</Title>
               <Caption>Bills Unpaid</Caption>
             </View>
         </View>
   
   
   
               <Text style={styles.title}> Water Usage</Text>
               <VictoryChart
            animate={{
              duration: 800,
              onLoad: { duration: 800 }
            }}
        theme={VictoryTheme.material}
        domainPadding={{ x: 15 }}
      >

        
        <VictoryAxis
          tickValues={data.map((item) => item.month)}
          style={{
            tickLabels: { angle: -45, fontSize: 8 },
          }}
        />
        <VictoryAxis
          dependentAxis
          tickFormat={(x) => `${x}L`}
        />
        <VictoryBar
          data={data}
          x="month"
          y="usage"
          alignment="start"
          cornerRadius={3}
          style={{
            data: {
              fill: '#82c6c4',
              stroke: '#549c9c',
              strokeWidth: 2
            },
            labels: {
              fontSize: 12,
              fill: '#333'
            }
          }}
        />
      </VictoryChart>
                 </View>
                 </ScrollView>
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