import React, { useState } from "react";
import {Text, View, Image, StyleSheet} from 'react-native';
import Logo from '../../../asset/water.jpg';
import CustomInput from '../comp/CustomInput/CustomInput';
import CustomButton from '../comp/CustomButton/CustomButton';
const Signin =() =>{
    const [username, setUsername]=useState('');
    const [password, setPassword]=useState('');
    const onSignInPressed =() =>{
        console.warn('Sign in');
    }
    const onForgot =() =>{
        console.warn('Sign in');
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