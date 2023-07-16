import 'react-native-gesture-handler';
import * as React from 'react';
import  {useState,useEffect} from 'react';
import { Button, Text, View, Image, StyleSheet,ActivityIndicator,ScrollView,SafeAreaView} from 'react-native';
//import Logo from '../../../asset/water.jpg';
import CustomInput from '../comp/CustomInput/CustomInput';
import CustomButton from '../comp/CustomButton/CustomButton';
import { useNavigation ,useIsFocused} from "@react-navigation/native";


import {
  Avatar,
  Title,
  Caption,
  TouchableRipple,
} from 'react-native-paper';
import { State } from 'react-native-gesture-handler';

export default function TicketActive({ }) {
const navigation =useNavigation();
var user_id = require('../HomeScreen/HomeScreen');
const [ticket,setticket]=useState([]);
const supportTicket =[]
const resolveTicket=[]
const [isLoading, setIsLoading] = useState(true);
const isFocused = useIsFocused()
var tic_id=0
var tic_res=0





const fetch_ticket= async()=>{
  var APIURL = "http://159.223.83.53/mobile/fetch_ticket.php";
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
      setticket(Response)
      setIsLoading(false);
      
     
  })
  .catch((error)=>{
    console.error("ERROR FOUND" + error);
  })

}


//fetch ticket when it is forced deal with navigation error
 useEffect(() => {
    if(isFocused){
      fetch_ticket()
      
    }
}, [isFocused])


//only run render after fetch is completed
if(!isLoading){
  //validate if there a ticket fetch for support
  if( ticket[0][0].length>0 ){
  for (i =0; i <ticket[0][0].length ;i++){
    if(ticket[0][0][i]["ticketStatus"]=="0"){
    supportTicket.push(
      {suppTicid: ticket[0][0][i]["supportTicketID"],
      details: ticket[0][0][i]["details"],
      key: tic_id,
      time:  ticket[0][0][i]["time_of_issue"],

    },
    )
    tic_id=tic_id+1;
    }
    else{
      resolveTicket.push(
        {suppTicid: ticket[0][0][i]["supportTicketID"],
      details: ticket[0][0][i]["details"],
      key: tic_res,
      time_res: ticket[0][0][i]["time_of_resolution"],
    },
      )
      tic_res=tic_res+1;
    }
    
  }
}
//validate if there a ticket fetch for technical
if(ticket[1][0].length >0){
  for (i =0; i <ticket[1][0].length ;i++){
    if(ticket[1][0][i]["ticketStatus"]=="0"){
    supportTicket.push(
      {suppTicid: ticket[1][0][i]["complaintTicketID"],
      details: ticket[1][0][i]["details"],
      key: tic_id,
      time:  ticket[1][0][i]["time_of_issue"],
    },
    )
    tic_id=tic_id+1;
    }
    else{
      resolveTicket.push(
        {suppTicid: ticket[1][0][i]["supportTicketID"],
      details: ticket[1][0][i]["details"],key: tic_res,
      time_res: ticket[1][0][i]["time_of_resolution"],
    },
      )
      tic_res=tic_res+1;
    }
   
  }
}
  return (


<ScrollView style={styles.container}>

<Title style={[styles.title, {
      marginTop:15,
      marginBottom: 5,
      marginLeft: 125,
      fontSize:20,
      fontWeight:'700',
    }]}>Active Tickets</Title>

  {supportTicket.map((supportTicket) => { //This loop calls all the data in the array supportTicket and prints it out 
return (
<View key={supportTicket.key} style={styles.card}>
  <View style={styles.cardInfo}>
    <Text style={styles.cardTitle}>No.
    {supportTicket.key}
    </Text>
    <Text style={styles.cardDetails}>Id:
      {supportTicket.suppTicid}
    </Text>
    <Text style={styles.cardDetails}>Time of creation:
      {supportTicket.time}
    </Text>
    <Text style={styles.cardDetails}>Detail:
      {supportTicket.details}
    </Text>


  </View>
   </View>

); //End of loop below
})} 
<Title style={[styles.title, {
      marginTop:15,
      marginBottom: 5,
      marginLeft: 125,
      fontSize:20,
      fontWeight:'700',
//Show resolved Ticket
 }]}>Resolved Ticket</Title>
{resolveTicket.map((resolveTicket) => { 
return (
<View key={resolveTicket.key} style={styles.card}>
  <View style={styles.cardInfo}>
    <Text style={styles.cardTitle}>No.
    {resolveTicket.key}
    </Text>
    <Text style={styles.cardDetails}>Id:
      {resolveTicket.suppTicid}
    </Text>
    <Text style={styles.cardDetails}>Time of resolved:
      {resolveTicket.time_res}
    </Text>
    <Text style={styles.cardDetails}>Detail:
      {resolveTicket.details}
    </Text>
  </View>
   </View>

); //End of loop below
})} 
<Button
title="Submit a New Ticket"
onPress={() => navigation.navigate("SubmitTicket")} />


</ScrollView>
);
}}

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
    height: 120,
    marginVertical: 10,
    flexDirection: 'row',
    shadowColor: '#999',
    shadowOffset: {width: 0, height: 1},
    shadowOpacity: 0.8,
    shadowRadius: 2,
    elevation: 5,
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
    borderWidth: 1,
    borderLeftWidth: 0,
    borderBottomRightRadius: 8,
    borderTopRightRadius: 8,
    backgroundColor: '#fff',
  },
  cardTitle: {
    fontWeight: 'bold',
  },
  cardDetails: {
    fontSize: 12,
    color: '#444',
  },
});


