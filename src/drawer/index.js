import 'react-native-gesture-handler';
import React from 'react';
import { createDrawerNavigator } from '@react-navigation/drawer';
import EditProfile from '../screens/EditProfile/EditProfile';
import HomeScreen from '../screens/HomeScreen/HomeScreen';
import CustomDrawer from '../screens/comp/CustomDrawer/CustomDrawer';
import Ionicons from 'react-native-vector-icons/Ionicons'
import TicketScreen from '../screens/TicketActive/TicketActive';
import BillScreen from '../screens/Bill/BillScreen';
//drawer for home screen
const Drawer=()=>{
    const Drawer = createDrawerNavigator();
    return(
        <Drawer.Navigator drawerContent={props => <CustomDrawer {...props}/>} 
        screenOptions={{ headerShown:true,drawerLabelStyle:{marginLeft: -25,fontSize:15,fontFamily:'Roboto-Medium',},}}>
            <Drawer.Screen name="HomeScreen" component={HomeScreen} options={{
                drawerIcon:(color) =>(
                    <Ionicons name="home-outline" size={22} color={color}/>
                )
            }}/>
            <Drawer.Screen name="EditProfile" component={EditProfile} options={{
                drawerIcon:(color)=>(
                    <Ionicons name="person-outline" size={22} color={color}/>
                )
            }}/>
             <Drawer.Screen name="Bill" component={BillScreen} options={{
                drawerIcon:(color)=>(
                    <Ionicons name="document" size={22} color={color}/>
                )
            }}/>
            <Drawer.Screen name="Ticket" component={TicketScreen} options={{
                drawerIcon:(color)=>(
                    <Ionicons name="help-circle-outline" size={22} color={color}/>
                )
            }}/>
        </Drawer.Navigator>
    )
}
export default Drawer