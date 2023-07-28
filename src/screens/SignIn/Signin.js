import React, { useState } from "react";
import {Text, View, Image, StyleSheet, TouchableOpacity } from 'react-native';
import Logo from '../../../asset/water.jpg';
import CustomInput from '../comp/CustomInput/CustomInput';
import CustomButton from '../comp/CustomButton/CustomButton';
import { useNavigation } from "@react-navigation/native";
import * as Animatable from 'react-native-animatable';
import LinearGradient from 'react-native-linear-gradient';
import { useTheme } from 'react-native-paper';
const Signin =() =>{
    const [username, setUsername]=useState('');
    const [password, setPassword]=useState('');
    const navigation =useNavigation();

    const { colors } = useTheme();
  
    const onSignInPressed =() =>{
        var Email = username;
        var Password = password;
        var APIURL = "http://159.223.83.53/mobile/login.php"
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
            
            if (Response[0].Message == "Success") {
              module.exports = Email;
              navigation.navigate("Home");
            }
            else{
                alert(Response[0].Message)
            }
            
          })
          .catch((error)=>{
            console.error("ERROR FOUND" + error);
          })
        
        
    }
    const onForgot =() =>{
        navigation.navigate("ForgotPassword");
    }
   
    
    return(

      <View style={styles.container}>
        
       
        

    <Animatable.View 
    
        animation="fadeInUpBig"
        style={[styles.footer, {
            backgroundColor: colors.background
        }]}
    >
        
         <Image source={Logo} style={styles.logo} resizeMode="contain"/>
         
        <Text style={[styles.text_footer, {
            color: colors.text,
        }]}>Username</Text>
        <View style={styles.action}>

            <CustomInput 
            
            value={username}
            setValue={setUsername}
                placeholder="Your Username"
                placeholderTextColor="#666666"
                style={[styles.textInput, {
                    color: colors.text
                }]}
                autoCapitalize="none"
                onChangeText={(val) => textInputChange(val)}
                onEndEditing={(e)=>handleValidUser(e.nativeEvent.text)}
            />

        </View>

        

        <Text style={[styles.text_footer, {
            color: colors.text,
            marginTop: 35
        }]}>Password</Text>
        <View style={styles.action}>

            <CustomInput 
                        value={password}
                        setValue={setPassword}
                        
                        secure={true}
                placeholder="Your Password"
                placeholderTextColor="#666666"
   
                style={[styles.textInput, {
                    color: colors.text
                }]}
                autoCapitalize="none"
                onChangeText={(val) => handlePasswordChange(val)}
            />

        </View>

        

        <TouchableOpacity onPress={onForgot} >
            <Text style={{color: '#364d88', marginTop:15}}>Forgot password?</Text>
        </TouchableOpacity>
        <View style={styles.button}>
            <TouchableOpacity onPress={onSignInPressed}
                style={styles.signIn}

            >
            <LinearGradient
                colors={['#364d88', '#7796cb']}
                style={styles.signIn}
            >
                <Text style={[styles.textSign, {
                    color:'#fff'
                }]}>Sign In</Text>
            </LinearGradient>
            </TouchableOpacity>

            
        </View>
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
      backgroundColor: '#fff',
     
      
    },
    header: {
        flex: 0,
        justifyContent: 'flex-end',
        paddingHorizontal: 0,
        paddingBottom: 0,
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
       
        paddingTop: 100,
    },
    text_header: {
        color: '#05375a',
        fontWeight: 'bold',
        fontSize: 30
    },
    text_footer: {
        color: '#05375a',
        fontSize: 18,
        paddingTop: 0,
        
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
    }
})
export default Signin