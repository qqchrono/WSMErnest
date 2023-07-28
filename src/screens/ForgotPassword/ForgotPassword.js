import React, {useEffect, useState} from'react';
import { TextInput,View,Text,Image,ScrollView,StyleSheet, TouchableOpacity} from 'react-native';
import Logo from '../../../asset/water.jpg';
import * as Animatable from 'react-native-animatable';
import LinearGradient from 'react-native-linear-gradient';
import CustomInput from '../comp/CustomInput/CustomInput';
import { useTheme } from 'react-native-paper';
import CustomButton from '../comp/CustomButton/CustomButton';
import { CommonActions, useNavigation } from "@react-navigation/native";

const ForgotPassword = () => {
    const [email,setemail] = useState([]);
    const navigation =useNavigation();
    const onReturn =() =>{
        
        navigation.navigate('SignIn');
    }
    const { colors } = useTheme();
    const validate_email=()=>{
      if(email!=""){
        var APIURL = "http://159.223.83.53/mobile/fetch_company.php";
         var headers = {
        'Accept' : 'application/json',
        'Content-Type' : 'application/json'
      };
      var Data ={
        Email: email,
      };
      fetch(APIURL,{
        method: 'POST',
        headers: headers,
        body: JSON.stringify(Data)
      })
      .then((Response)=>Response.json())
      .then((Response)=>{
        if((Response[0].Message)!=""){
          var comp = (Response[0].Message)
          reset_password(comp['companyUEN']);
        }
        else{
          alert("Email is not valid, Please enter a valid email!!");
        }
       
       
      })
      .catch((error)=>{
        console.error("ERROR FOUND" + error);
      })
       }
       
    }
    
    const reset_password=(comp)=>{
       if(comp!=""){
        var APIURL = "http://159.223.83.53/mobile/reset_password.php";
         var headers = {
        'Accept' : 'application/json',
        'Content-Type' : 'application/json'
      };
      var Data ={
        Email: email,
        companyUEN: comp,
        type : "passwordreset"
      };
      fetch(APIURL,{
        method: 'POST',
        headers: headers,
        body: JSON.stringify(Data)
      })
      .then((Response)=>Response.json())
      .then((Response)=>{
        if(Response[0].Message==true){
          alert("Reset Password Request sent, Check email to reset your password")
        }
        else{
          alert("ERROR 404 , Contact Customer service for more information")
        }
       
       
      })
      .catch((error)=>{
        console.error("ERROR FOUND" + error);
      })
       }
       
    }


    return (
        
      <View style={styles.container}>
        
       
        

      <Animatable.View 
      
          animation="fadeInUpBig"
          style={[styles.footer, {
              backgroundColor: colors.background
          }]}
      >
          
           <Image source={Logo} style={styles.logo} resizeMode="contain"/>
           
          <Text style={[styles.text_footer, {
              color: colors.text
          }]}>Reset your password</Text>
          <View style={styles.action}>
  
              <TextInput 
              

                  placeholder="Your Email"
                  defaultValue=""
                  placeholderTextColor="#666666"
                  style={[styles.textInput, {
                      color: colors.text
                  }]}
                  autoCapitalize="none"
                  onChangeText={(value) => setemail(value)}
                  
              />


  
          </View>
  
          

          <View style={styles.action}>

          <TouchableOpacity onPress={validate_email}

style={[styles.signIn, {
    borderColor: '#364d88',
    borderWidth: 1,
    marginTop: 15
}]}
>
<Text style={[styles.textSign, {
    color: '#364d88'
}]}>Submit</Text>
</TouchableOpacity>
          </View>
          <TouchableOpacity onPress={onReturn} style={[styles.signIn]} >
<Text style={{color: '#364d88', marginTop:15}}>Return to Sign in page</Text>
</TouchableOpacity>
  
          
  


      </Animatable.View>
    </View>

    )
}

const styles= StyleSheet.create({
  root:{
      alignItems: 'center',
      padding : 20,
  },
  logo:{
    width:'100%',

  
},
container: {
  flex: 1, 
  backgroundColor: '#364d88'
  
},
header: {
    flex: 0,
    justifyContent: 'flex-end',
    paddingHorizontal: 0,
    paddingBottom: 80,
    borderBottomLeftRadius: 40,
    borderBottomRightRadius: 40,
},
footer: {
    flex: 0,
    justifyContent: 'flex-end',
    backgroundColor: '#000000',
    borderTopLeftRadius: 40,
    borderTopRightRadius: 40,
    borderBottomLeftRadius: 40,
    borderBottomRightRadius: 40,
    paddingHorizontal: 20,
    paddingVertical: 30
},
text_header: {
    color: '#05375a',
    fontWeight: 'bold',
    fontSize: 30
},
text_footer: {
    color: '#05375a',
    fontSize: 18,
    
},
action: {
    flexDirection: 'row',
    marginTop: 10,
    borderBottomWidth: 1,
    borderBottomColor: '#f2f2f2',
    paddingBottom: 0
},
actionError: {
    flexDirection: 'row',
    marginTop: 10,
    borderBottomWidth: 1,
    borderBottomColor: '#FF0000',
    paddingBottom: 5
},
textInput: {
    flex: 1,
    marginTop: Platform.OS === 'ios' ? 0 : -12,
    paddingLeft: 10,
    color: '#05375a',
},
errorMsg: {
    color: '#FF0000',
    fontSize: 14,
},
button: {
    alignItems: 'center',
    marginTop: 50
},
signIn: {
    width: '100%',
    height: 50,
    justifyContent: 'center',
    alignItems: 'center',
    borderRadius: 10
},
textSign: {
    fontSize: 18,
    fontWeight: 'bold'
},
})
export default ForgotPassword