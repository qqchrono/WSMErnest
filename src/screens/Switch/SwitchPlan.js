import React, {useEffect, useState} from'react';
import { TextInput,View,Text,ScrollView,StyleSheet} from 'react-native';
import CustomInput from '../comp/CustomInput/CustomInput';
import CustomButton from '../comp/CustomButton/CustomButton';
import { useNavigation } from "@react-navigation/native";

const SwitchPlan = () => {
    const [email,setemail] = useState([]);
    const navigation =useNavigation();
    const onReturn =() =>{
        
        navigation.navigate('SignIn');
    }
    

    const reset_password=()=>{
        console.log(email)
       if(email!=""){
        var APIURL = "http://159.223.83.53/mobile/reset_password.php";
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
                <CustomButton text="Submit" onPress={reset_password} />
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
export default SwitchPlan