import React, {useEffect, useState} from'react';
import { TextInput,View,Text,ScrollView,StyleSheet} from 'react-native';
import CustomInput from '../comp/CustomInput/CustomInput';
import CustomButton from '../comp/CustomButton/CustomButton';
import { useNavigation } from "@react-navigation/native";
import { Avatar, Button, Card } from 'react-native-paper';

export default function TicketActive({ }) {
  const navigation =useNavigation();
  var user_id = require('../HomeScreen/HomeScreen');
  const [isLoading, setIsLoading] = useState(true);
  const [companydetail, setcompanydetail] = useState([]);
  var companydetails=[];
  var Email = require('../SignIn/Signin.js');
  //selected company
  function changeCompany(companyuen) {
    if(companyuen!=""){
      var APIURL = "http://159.223.83.53/mobile/reset_password.php";
       var headers = {
      'Accept' : 'application/json',
      'Content-Type' : 'application/json'
    };
    var Data ={
      Email: Email,
      companyUEN: companyuen,
      type : "switchcompany"
    };
    fetch(APIURL,{
      method: 'POST',
      headers: headers,
      body: JSON.stringify(Data)
    })
    .then((Response)=>Response.json())
    .then((Response)=>{
      alert(Response[0].Message)
      alert("Application submitted, changed will be taking effect in the following month, make sure all outstading bill are paid!")
     
    })
    .catch((error)=>{
      console.error("ERROR FOUND" + error);
    })
     }
    //insert change company algo here
    alert(companyuen);
  }
  //fetch company detail
  const fetch_company=()=>{
    var APIURL = "http://159.223.83.53/mobile/fetch_company_detail.php";
    var headers = {
      'Accept' : 'application/json',
      'Content-Type' : 'application/json'
    };
    
    fetch(APIURL,{
      method: 'POST',
      headers: headers,
      body: JSON.stringify()
    })

    .then((Response)=>Response.json())
    .then((Response)=>{
      setcompanydetail(Response)
      setIsLoading(false)

    })
    .catch((error)=>{
      console.error("ERROR FOUND" + error);
    })
  }

  useEffect(() => {
   fetch_company()
   
  }, [])

  
  /*var companydetails = [
    {
      uen: 'UEN123',
      name: 'Company A',
      companyAddress: '123 Main Street, City A',
    },
    {
      uen: 'UEN456',
      name: 'Company B',
      companyAddress: '456 Broadway, City B',
    },
    {
      uen: 'UEN789',
      name: 'Company C',
      companyAddress: '789 Park Avenue, City C',
    },
  ];
*/

  if(!isLoading){
    //valide if company exist 
    if(companydetail.length!=null){
      for(var x=0; x<companydetail.length;x++){
        companydetails.push(
          {uen:companydetail[x]['companyUEN'],
          name:companydetail[x]['companyName'],
          companyAddress: companydetail[x]['companyAddress'],
          }
        )
      }
    }
    return (
  


<ScrollView showsHorizontalScrollIndicator={false}>


      {companydetails.map((company,index) => {   // this loop calls the data for companies and prints it out 
    return (
        
    <View key={index}>   
        <Card key={companydetails.key} style={styles.container}>
                <Card.Cover source={{ uri: 'https://anzsog.edu.au/app/uploads/2022/06/sydney-water.jpg' }} />
                <Card.Content style={styles.cardTitle} >
            <Text style={styles.cardTitle}>{company.name}</Text> 
            <Text style={styles.cardDetails}>Company UEN: {company.uen}</Text> 
            <Text style={styles.cardDetails}>Company Address: {company.companyAddress}</Text> 
            </Card.Content>
            <Card.Content>
              <Text style={styles.cardDetails}>{company.name} supplies about 1.5 billion litres of safe drinking water to our customers each day, 
              which is sourced from a network of dams managed by WaterNSW. 
              About 80% of our water comes from Lake Burragorang behind Warragamba Dam.</Text>
              
              
            </Card.Content>
            <Card.Title title="Cost per L:" subtitle="0.72$/L"  /> 
            
            <Card.Actions>
              
              <Button onPress={()=>changeCompany(company.uen)} >Change Supplier</Button>
            </Card.Actions> 
          </Card>
  
    </View>
 
  
  
  
    );
        })} 
        </ScrollView>
   

      
  
  

  );
  }
}

const styles= StyleSheet.create({
    root:{
        alignItems: 'center',
        padding : 20,
    },
    container :{
      alignContent:'center',
      margin:27
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
      card: {
        width: 350,
        height: 360,
        borderRadius: 6,
        marginVertical: 12,
        marginHorizontal: 16
    },
    cardTitle: {
      fontSize: 24,
      fontWeight: 'bold',
      marginTop: 8,
      marginBottom: 3,
    },
    cardDetails: {
      fontSize: 16,
      color: '#444',
      marginTop: 5,
      marginBottom: 5,
    },
})
