import React from 'react'
import{ View,Text,ImageBackground} from 'react-native'
import { DrawerContentScrollView,DrawerItemList } from '@react-navigation/drawer'
import Ionicons from 'react-native-vector-icons/Ionicons'
import { TouchableOpacity } from 'react-native-gesture-handler'
import { useNavigation } from "@react-navigation/native";
import Logo from '../../../../asset/water.jpg';
//custom drawer 
const CustomDrawer = (props)=>{
    const navigation =useNavigation();
    return(
        <View style={{flex:1}}>
        <DrawerContentScrollView 
        {...props}
        contentContainerStyle={{backgroundColor:'#ADD8E6'}}>
        <ImageBackground source={Logo} style={{padding:20}}>
            <Text style={{color:'#fff'}}>WELCOME! name</Text>
        </ImageBackground>
            <View style={{flex:1, backgroundColor:'#fff',padding:10}}>
            <DrawerItemList {...props}/>
            </View>
        </DrawerContentScrollView>
            <View style={{padding:20,borderTopWidth:1 ,borderTopColor:'#ccc'}}>
                <TouchableOpacity onPress={()=>navigation.navigate("SignIn")} style={{paddingVertical: 15}}>
                    <View style={{flexDirection:'row',alignItems:'center'}}>
                    <Ionicons name="exit-outline" size={22}/>
                    <Text style={{fontSize:15,marginLeft:5,}}>Sign Out</Text>
                    </View>
                </TouchableOpacity>
            </View>
        </View>
    )
}
export default CustomDrawer