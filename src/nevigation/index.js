
import React from 'react';
import { View, Text, StyleSheet, TextInput } from 'react-native';
import Signin from '../screens/SignIn';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import ForgotPassword from '../screens/ForgotPassword';
import EditProfile from '../screens/EditProfile/EditProfile';
import Drawer from '../drawer';
import TicketScreen from '../screens/Ticket/TicketScreen';
import TicketActive from '../screens/TicketActive/TicketActive';
const Stack = createNativeStackNavigator();

const Navigation = () => {
    return (
        
            <Stack.Navigator  screenOptions={{headerShown:false} }>
                <Stack.Screen name="SignIn" component={Signin}/>
                <Stack.Screen name="Home" component={Drawer}/>
                <Stack.Screen name="ForgotPassword" component={ForgotPassword}/> 
                <Stack.Screen name="EditProfile" component={EditProfile}/>
                <Stack.Screen name="SubmitTicket" component={TicketScreen}/>
                
            </Stack.Navigator>
        
        
    )
}


export default Navigation