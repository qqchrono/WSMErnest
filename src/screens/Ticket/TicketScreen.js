
import React, {useState} from 'react';
import {
  View,
  Text,
  ScrollView, 
  StyleSheet,
  TouchableOpacity,
  ImageBackground,
  TextInput,
} from 'react-native';

import {useTheme} from 'react-native-paper';
import {
  Avatar,
  Title,
  Caption,
  TouchableRipple,
} from 'react-native-paper';

import Icon from 'react-native-vector-icons/MaterialCommunityIcons';
import FontAwesome from 'react-native-vector-icons/FontAwesome';
import Feather from 'react-native-vector-icons/Feather';
import BottomSheet from 'reanimated-bottom-sheet';
import Animated from 'react-native-reanimated';
import { RadioButton } from 'react-native-paper';
import { useNavigation } from "@react-navigation/native";
import AsyncStorage from '@react-native-async-storage/async-storage';

export default function TicketScreen() {
  const {colors} = useTheme();
  const [checked, setChecked] = React.useState('');
  const [detail,setdetail]=useState([]);
  const [companyUEN,setcompanyUEN]=useState([]);
  var user_id = require('../HomeScreen/HomeScreen');
  const navigation =useNavigation();
  //fetch asyn store companyuen
  AsyncStorage.getItem('companyUEN').then(value=>{
    setcompanyUEN(value)
   })
   .catch(error => console.error(error));
  //submit ticket
  const submit=()=>{
    var APIURL="";
    if(checked=="Support"){
      APIURL= "http://159.223.83.53/mobile/submit_support.php"
    }
    else{
      APIURL= "http://159.223.83.53/Tickets/Complaint%20Tickets/assignTicketForm.php"
    }
    var headers ={
      'Accept' : 'application/json',
      'Content-Type' : 'application/json'
    }
    var Data={
      user_id: user_id,
      detail: detail,
      type: checked,
      companyUEN: companyUEN,
    };
    fetch(APIURL,{
      method: 'POST',
      headers: headers,
      body: JSON.stringify(Data)
    })
    .then((Response)=>Response.json())
    .then((Response)=>{
      alert(Response[0].Message)
      navigation.navigate("Ticket") 

    })
    .catch((error)=>{
      console.error("ERROR FOUND" + error);
    })
}




   return (
   <View style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}>
<View style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}>
<Text style={{textDecorationLine: 'underline',fontSize:16,fontWeight:'700',marginBottom: 20,}}> Submit a {checked} Ticket</Text>


 <View style={styles.userInfoSection}>
    <Text>Support (General Support)</Text>
      <RadioButton
        value="Support" 
        status={ checked === 'Support' ? 'checked' : 'unchecked' } //if the value of checked is Servicing, then select this button
        onPress={() => setChecked('Support')} //when pressed, set the value of the checked Hook to 'Servicing'
      />
      <Text>Technical Support (Complaint/Complex issue) </Text>
      <RadioButton
        value="Technical"
        status={ checked === 'Technical' ? 'checked' : 'unchecked' }
        onPress={() => setChecked('Technical')}
      />
      <Text> </Text>
    </View>

<View style={styles.action}>

          <TextInput
            placeholder="Type in the details here"
            placeholderTextColor="#666666"
            keyboardType="email-address"
            autoCorrect={false}
            onChangeText={(value) => setdetail(value)}
            style={[
              styles.textboxInput,
              {
                color: colors.text,
              },
            ]}
          />

           

        </View>
       

        
        

<TouchableOpacity style={styles.commandButton} onPress={() => submit()}> 
          <Text style={styles.panelButtonTitle}>
          Submit Ticket
          </Text>
        </TouchableOpacity>


        


      </View>
</View>
   );
 }

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

    commandButton: {
    padding: 15,
    borderRadius: 10,
    backgroundColor: '#1372C2',
    alignItems: 'center',
    width: "100%",
    width: "95%",
    borderWidth: 0,
    borderRadius: 10,
    padding: 10,
    margin: 150,
    
  },
  panel: {
    padding: 20,
    backgroundColor: '#FFFFFF',
    paddingTop: 20,
    // borderTopLeftRadius: 20,
    // borderTopRightRadius: 20,
    // shadowColor: '#000000',
    // shadowOffset: {width: 0, height: 0},
    // shadowRadius: 5,
    // shadowOpacity: 0.4,
  },
  header: {
    backgroundColor: '#FFFFFF',
    shadowColor: '#333333',
    shadowOffset: {width: -1, height: -3},
    shadowRadius: 2,
    shadowOpacity: 0.4,
    // elevation: 5,
    paddingTop: 20,
    borderTopLeftRadius: 20,
    borderTopRightRadius: 20,
  },
  panelHeader: {
    alignItems: 'center',
  },
  panelHandle: {
    width: 40,
    height: 8,
    borderRadius: 4,
    backgroundColor: '#00000040',
    marginBottom: 10,
  },
  panelTitle: {
    fontSize: 27,
    height: 35,
  },
  panelSubtitle: {
    fontSize: 14,
    color: 'gray',
    height: 30,
    marginBottom: 10,
  },
  panelButton: {
    padding: 13,
    borderRadius: 10,
    backgroundColor: '#FF6347',
    alignItems: 'center',
    marginVertical: 7,

  },
  panelButtonTitle: {
    fontSize: 17,
    fontWeight: 'bold',
    color: 'white',


  },
  action: {
    flexDirection: 'row',
    marginTop: 1,
    marginBottom: 1,
    borderBottomWidth: 1,
    borderBottomColor: '#f2f2f2',
    paddingBottom: 5,
     borderColor: "gray",
    width: "100%",
    borderWidth: 0,
    borderRadius: 10,
    padding: 10,
  },
  actionError: {
    flexDirection: 'row',
    marginTop: 10,
    borderBottomWidth: 1,
    borderBottomColor: '#FF0000',
    paddingBottom: 5,
  },
  textInput: {
    flex: 1,
    marginBottom:1,
    marginTop: Platform.OS === 'ios' ? 0 : -12,
    paddingLeft: 10,
    color: '#05375a',
     borderColor: "gray",
    width: "50%",
    borderWidth: 1,
    borderRadius: 10,
    padding: 10,
  },
  textboxInput: {
    flex: 1,
    marginBottom:0,
    marginTop: Platform.OS === 'ios' ? 0 : -12,
    paddingLeft: 10,
    color: '#05375a',
     borderColor: "gray",
     height: "500%",
    width: "50%",
    borderWidth: 1,
    borderRadius: 10,
    padding: 10,
  },
})



