import 'react-native-gesture-handler';
import * as React from 'react';
import { Button, Text, View, Image, StyleSheet} from 'react-native';
//import Logo from '../../../asset/water.jpg';
import CustomInput from '../comp/CustomInput/CustomInput';
import CustomButton from '../comp/CustomButton/CustomButton';
import { useNavigation } from "@react-navigation/native";


import {
  Avatar,
  Title,
  Caption,
  TouchableRipple,
} from 'react-native-paper';

export default function TicketActive({ }) {
const navigation =useNavigation();
const a=["hi","bye","check"];
const supportTicket = []
for (i =0; i <a.length ;i++){
  supportTicket.push(
    {suppTicid: 'a',
    details: "maybe"},
  )
}



   return (

   


<View style={styles.container}>

        <Title style={[styles.title, {
              marginTop:15,
              marginBottom: 5,
              marginLeft: 125,
              fontSize:20,
              fontWeight:'700',
            }]}>Active Tickets</Title>
     
            
          
          

          {supportTicket.map((supportTicket) => { //This loop calls all the data in the array supportTicket and prints it out 
        return (
        <View style={styles.card}>
          <View style={styles.cardInfo}>
            <Text style={styles.cardTitle}>
            {supportTicket.suppTicid}
            </Text>
            
            <Text style={styles.cardDetails}>
              {supportTicket.details}
            </Text>
          </View>
           </View>

        ); //End of loop below
      })} 
      

        


          




<Button
      title="Submit a New Ticket"
      onPress={() => navigation.navigate('SubmitTicket')} />
      

     


</View>


  );
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


