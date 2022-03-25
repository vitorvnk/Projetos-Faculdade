import 'package:flutter/material.dart';

void main(){
  runApp(new HelloWorldScrean());
}

class HelloWorldScrean extendds StatelessWidget{
  @override
  Widged build(BuildContext context){
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text("Olá, mundo!")
        ),
        body: center(child: Text("Olá"))
      )
    ); //MaterialApp
  }
}