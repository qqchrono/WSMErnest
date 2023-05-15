/**
 * Sample React Native App
 * https://github.com/facebook/react-native
 *
 * @format
 */

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

function App(): JSX.Element {
  const isDarkMode = useColorScheme() === 'dark';

 

  return (
    <SafeAreaView style={{flex: 1}}>
      <Navigation/>
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  root:{
    flex: 1,
    backgroundColor : '#F9FBFC',
  }
})


export default App;
