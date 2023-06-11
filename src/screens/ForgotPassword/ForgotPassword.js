import React, {useState} from'react';
import { View,Text,ScrollView,StyleSheet} from 'react-native';
import CustomInput from '../comp/CustomInput/CustomInput';
import CustomButton from '../comp/CustomButton/CustomButton';
import { useNavigation } from "@react-navigation/native";
const ForgotPassword = () => {
    const[username,setUsername] =  useState('')
    const navigation =useNavigation();
    const onReturn =() =>{
        
        navigation.navigate('SignIn');
    }
    return (
        <ScrollView showsHorizontalScrollIndicator={false}>
            <View>
                <Text style={styles.title}>Forgot Password</Text>
                <CustomInput 
                placeholder="Username"
                value={username}
                setValue={setUsername}
                />
                <CustomButton text="Submit"  />
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
    }
})
export default ForgotPassword