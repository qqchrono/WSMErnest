
import React, {useState,useEffect} from 'react';
import {
  View,
  Text,
  SafeAreaView, 
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
} from 'react-native-paper';



export default function AccountScreen() {
var Email = require('../SignIn/Signin.js');
const {colors} = useTheme();
const [name,setname] = useState([]);
const [password,setpassword] = useState([]);
const [bankaccount,setbank] = useState([]);
const [phone,setphone] = useState([]);

//fetch user data from database to editprofile page 
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
        setname(Response[0]['customerName'])
        setpassword(Response[0]['password'])
        setbank(Response[0]['bankAccount'])
        setphone(Response[0]['phone'])
    })
    .catch((error)=>{
      console.error("ERROR FOUND" + error);
    })
  
  }
//update used data after submit 
const update_detail=()=>{
    var APIURL= "http://10.0.2.2/mobile/edit_user_profile.php"
    var headers ={
      'Accept' : 'application/json',
      'Content-Type' : 'application/json'
    }
    var Data={
      Phone: phone,
      Bank: bankaccount,
      password: password,
      Email :Email
    };
    fetch(APIURL,{
      method: 'POST',
      headers: headers,
      body: JSON.stringify(Data)
    })
    .then((Response)=>Response.json())
    .then((Response)=>{
      alert(Response[0].Message)

    })
    .catch((error)=>{
      console.error("ERROR FOUND" + error);
    })
}


useEffect(()=>{
    fetch_user_detail()
},[])

   return (
   

   <View>
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
                        }]}>{name}</Title>
                        <Caption style={styles.caption}>{Email}</Caption>
                      </View>
                    </View>
                  </View>

        <View style={{marginLeft: 20}}>
                        <Title style={[styles.title, {
                          marginTop:15,
                          marginBottom: 5,
                        }]}>Edit your particulars:</Title>
                      </View>
         
        <View style={styles.action}>
         
          <TextInput
            defaultValue={phone}
            placeholder="Phone"
            placeholderTextColor="#666666"
            keyboardType="number-pad"
            onChangeText={(value) => setphone(value)}
            style={[
              styles.textInput,
              {
                color: colors.text,
              },
            ]}
          />
        </View>
         <View style={styles.action}>
         
          <TextInput
            defaultValue={bankaccount}
            placeholder="Bank Account Number"
            placeholderTextColor="#666666"
            keyboardType="number-pad"
            onChangeText={(value) => setbank(value)}
            style={[
              styles.textInput,
              {
                color: colors.text,
              },
            ]}
          />
        </View>
      
       
        <View style={styles.action}>
          
          <TextInput
          secureTextEntry={true}
          defaultValue={password}
            placeholder="Password"
            placeholderTextColor="#666666"
            onChangeText={(value) => setpassword(value)}
            mode="outlined"
            style={[
              styles.textInput,
              {
                color: colors.text,
              },
            ]}
          />
        </View>
       <TouchableOpacity style={styles.commandButton} onPress={() => update_detail()}> 
          <Text style={styles.panelButtonTitle}>
          Submit
          </Text>
        </TouchableOpacity>
        
        

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
    borderWidth: 0,
    borderRadius: 10,
    padding: 10
    
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
});

