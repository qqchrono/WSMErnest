
import React, {useState,useEffect} from 'react';
import {
  View,
  Text,
  SafeAreaView, 
  StyleSheet,
  TouchableOpacity,
  ImageBackground,
  TextInput,
  Dimensions,
} from 'react-native';
import Logo from '../../../asset/water.jpg';
import Icon from 'react-native-vector-icons/MaterialCommunityIcons';
import { ScrollView } from 'react-native-gesture-handler';
import LinearGradient from 'react-native-linear-gradient';
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
        setname(Response[0]['customerName'])
        setpassword(Response[0]['password'])
        setbank(Response[0]['bankAccount'])
        setphone(Response[0]['phoneNumber'])
    })
    .catch((error)=>{
      console.error("ERROR FOUND" + error);
    })
  
  }
//update used data after submit 
const update_detail=()=>{
    var APIURL= "http://159.223.83.53/mobile/edit_user_profile.php"
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
   

   <ScrollView>





               <View style={styles.userInfoSection}>
                
                    <View style={{alignItems: 'center'}}>
                      <Avatar.Image 
                        source={{
                          uri: 'https://image.shutterstock.com/image-photo/portrait-smiling-red-haired-millennial-260nw-1194497251.jpg',
                        }}
                        size={90}
                      />
                      
                    </View>
                    <View style={{alignItems: 'center'}}>
                        <Title style={[styles.title, {
                          marginTop:15,
                          marginBottom: 5,
                        }]}>{name}</Title>
                        <Caption style={styles.caption}>{Email}</Caption>
                      </View>
                  </View>

                  <View >
                    <Title style={[styles.title]}>  Edit your particulars:</Title>             
                  </View>
         
        <View style={styles.action}>
         <Text style={styles.caption}>Phone:               </Text>
          <TextInput
            defaultValue={String(phone)}
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
         <Text style={styles.caption}>Bank Account : </Text>
          <TextInput
            defaultValue={String(bankaccount)}
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
        <Text style={styles.caption}>Password:         </Text>
          <TextInput
          secureTextEntry={true}
          defaultValue={String(password)}
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

        <View style={styles.button}>
            <TouchableOpacity onPress={() => update_detail()}
                style={styles.signIn}

            >
            <LinearGradient
                colors={['#364d88', '#7796cb']}
                style={styles.signIn}
            >
                <Text style={[styles.textSign, {
                    color:'#fff'
                }]}>Submit</Text>
            </LinearGradient>
            </TouchableOpacity>

            
        </View>

      </ScrollView>
   );
 }




   const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    paddingTop: 10,
    backgroundColor: '#ecf0f1',
    padding: 8,
  },
  userInfoSection: {
    paddingTop: 30,
    paddingHorizontal: 30,
    marginBottom: 25,
  },
  title: {
    fontWeight: 'bold',
    fontSize:20,
    fontWeight:'700',
      marginTop:15,
      marginBottom: 10,

      fontSize:20,
      textAlign: "left"

   },
  caption: {
    fontSize: 16,
    lineHeight: 24,
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
  textSign: {
    fontSize: 18,
    fontWeight: 'bold'
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
      width:"100%",
    padding: 15,
    borderRadius: 10,
    backgroundColor: '#1372C2',
    alignItems: 'center',
   
    borderWidth: 0,
    borderRadius: 10,
    padding: 10
    
  },
  Btn:
  { width:"100%",
    fontSize: 26,
    fontWeight: 'bold',
    color: 'white',
    borderRadius: 4,
    height: 55,
    raiseLevel: 6,
    backgroundColor: '#1775c8',
    backgroundDarker: '#125a9a',
    backgroundProgress: '#125a9a',
    textColor: '#FFF',
    activityColor: '#b3e5e1',
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
    borderBottomWidth: 0,
    borderBottomColor: '#f2f2f2',
    paddingBottom: 10,
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
  button: {
    alignItems: 'center',
    marginTop: 50
},
signIn: {
    width: '95%',
    height: 50,
    justifyContent: 'center',
    alignItems: 'center',
    borderRadius: 10
},
  
  
  
});

