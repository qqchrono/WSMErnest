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

import Signin from './src/screen/SignIn';

function App(): JSX.Element {
  const isDarkMode = useColorScheme() === 'dark';

 

  return (
    <SafeAreaView >
     <Signin/>
    </SafeAreaView>
  );
}


export default App;
