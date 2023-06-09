import React, { useState } from "react";
import {Text, View, Image, StyleSheet} from 'react-native';
import Logo from '../../../asset/water.jpg';
import CustomInput from '../comp/CustomInput/CustomInput';
import CustomButton from '../comp/CustomButton/CustomButton';
import { useNavigation } from "@react-navigation/native";
const Signin =() =>{
    const [username, setUsername]=useState('');
    const [password, setPassword]=useState('');
    const navigation =useNavigation();

    const onSignInPressed =() =>{
        var Email = username;
        var Password = password;
        var APIURL = "http://10.0.2.2/mobile/login.php"
        var headers = {
            'Accept' : 'application/json',
            'Content-Type' : 'application/json'
          };
                
          var Data ={
            Email: Email,
            Password: Password
          };
    
          fetch(APIURL,{
            method: 'POST',
            headers: headers,
            body: JSON.stringify(Data)
          })
          .then((Response)=>Response.json())
          .then((Response)=>{
            alert(Response[0].Message)
            if (Response[0].Message == "Success") {
              console.log("true")
              module.exports = Email;
              navigation.navigate("Home");
            }
            console.log(Data);
          })
          .catch((error)=>{
            console.error("ERROR FOUND" + error);
          })
        
        
    }
    const onForgot =() =>{
        navigation.navigate("ForgotPassword");
    }
   
    
    return(
        <View style={styles.root}>
            <Image source={Logo} style={styles.logo} resizeMode="contain"/>
            <CustomInput 
            placeholder="Username"
            value={username}
            setValue={setUsername}
            />
            <CustomInput 
            value={password}
            setValue={setPassword}
            placeholder="Password"
            secure={true}
            />
            <CustomButton text="Sign in" onPress={onSignInPressed}/>
            <CustomButton text="Forgot Password? " onPress={onForgot} type="sec"/>
        </View>

        
    )
}

const styles= StyleSheet.create({
    root:{
        alignItems: 'center',
        padding : 20,
    },
    logo:{
        width:'80%',
        height:100,
    },
})
export default Signin