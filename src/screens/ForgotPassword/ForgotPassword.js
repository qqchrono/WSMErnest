import React, {useEffect, useState} from'react';
import { TextInput,View,Text,ScrollView,StyleSheet} from 'react-native';
import CustomInput from '../comp/CustomInput/CustomInput';
import CustomButton from '../comp/CustomButton/CustomButton';
import { CommonActions, useNavigation } from "@react-navigation/native";

const ForgotPassword = () => {
    const [email,setemail] = useState([]);
    const navigation =useNavigation();
    const onReturn =() =>{
        
        navigation.navigate('SignIn');
    }
    
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
      console.log(comp)
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
        alert(Response[0].Message)
       
       
      })
      .catch((error)=>{
        console.error("ERROR FOUND" + error);
      })
       }
       
    }


    return (
        
        <ScrollView showsHorizontalScrollIndicator={false}>
            <View>
                <Text style={styles.title}>Forgot Password{"\n"}</Text>
                <TextInput
                placeholderTextColor="#666666"
                defaultValue=""
                placeholder="Email"
                onChangeText={(value) => setemail(value)}
                style={[
                    styles.textInput,
                   
                  ]}
                />
                <CustomButton text="Submit" onPress={validate_email} />
                <CustomButton text="return to Sign in page" onPress={onReturn} type='sec'/>
                
            </View>
        </ScrollView>

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
    title:{
        fontSize :24 ,
    },
    textInput: {
        flex: 1,
        marginBottom:2,
        marginTop: Platform.OS === 'ios' ? 0 : -12,
        paddingLeft: 10,
        color: '#05375a',
         borderColor: "gray",
        width: "100%",
        borderWidth: 2,
        borderRadius: 20,
        padding: 20,
      },
})
export default ForgotPassword