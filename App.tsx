/**
 * Sample React Native App
 * https://github.com/facebook/react-native
 *
 * @format
 */
import 'react-native-gesture-handler';
import React from 'react';
import {
  SafeAreaView,
  ScrollView,
  StatusBar,
  StyleSheet,
  Text,
  useColorScheme,
  View,
} from 'react-native';

import Signin from './src/screens/SignIn';
import Navigation from './src/nevigation';
import ForgotPassword from './src/screens/ForgotPassword';
import { createDrawerNavigator } from '@react-navigation/drawer';
import { NavigationContainer } from '@react-navigation/native';
import Homes from './src/screens/HomeScreen';
const Drawer = createDrawerNavigator();
function App(): JSX.Element {
  const isDarkMode = useColorScheme() === 'dark';

 

  return (
    <NavigationContainer>
      <Navigation/>
    </NavigationContainer>
  );
}

const styles = StyleSheet.create({
  root:{
    flex: 1,
    backgroundColor : '#F9FBFC',
  }
})


export default App;
