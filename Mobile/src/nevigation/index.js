import React from 'react';
import { View, Text, StyleSheet, TextInput } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import Signin from '../screens/SignIn';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import Homescreen from '../screens/HomeScreen'
import ForgotPassword from '../screens/ForgotPassword';
const Stack = createNativeStackNavigator();

const Navigation = () => {
    return (
        <NavigationContainer>
            <Stack.Navigator screenOptions={{headerShown:false}}>
                <Stack.Screen name="SignIn" component={Signin}/>
                <Stack.Screen name="Home" component={Homescreen}/>
                <Stack.Screen name="ForgotPassword" component={ForgotPassword}/> 
            </Stack.Navigator>
        </NavigationContainer>
        
    )
}


export default Navigation