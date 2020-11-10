import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-quizz',
  templateUrl: './quizz.page.html',
  styleUrls: ['./quizz.page.scss'],
})
export class QuizzPage implements OnInit {

  cpt=0;
  passer=0;
  next=0;
  btn=0;
  btnn=0;
  yes=0;
  no=0;
  v=0;
  s=0;
  point=0;
  
  premier=true;
  deuxieme=false;
  troisieme=false;
  quatrieme=false;
  resultat=false;

  connaitre=true;
  
  reponse1;
  reponse2;
  reponse3;
  
  constructor(private router :Router) { }

  ngOnInit() {
  }
  score(number){
    if(number==1){
      this.cpt++;
    }
    this.passer++;
   
  }
  pf(number,valeur){
    if(number==1){
      this.cpt++;
    }

    this.reponse1=valeur;
    this.reponse2=valeur;
    this.reponse3=valeur;
    this.premier=false;
    this.deuxieme=true;



  }

  df(number,valeur){
    if(number==1){
      this.cpt++;
      
    }

    this.reponse1=valeur;
    this.reponse2=valeur;
    this.reponse3=valeur;

    this.deuxieme=false;
    this.troisieme=true;

  }

tf(number,valeur){
  if(number==1){
    this.cpt++;
  }

  this.reponse1=valeur;
    this.reponse2=valeur;
    this.reponse3=valeur;

  this.troisieme=false;
  this.resultat=true

}

qf(number,valeur){
  if(number==1){
    this.cpt++;
  }

  this.reponse1=valeur;
    this.reponse2=valeur;
    this.reponse3=valeur;

this.passer++;
this.quatrieme=false;
this.connaitre=false

}

clique(){
  this.next++;
}

  ajout(){
    this.btn++;
  }

  btnnon(){
    this.btnn++;
  }

  btnyes(){
    this.yes++;
  }

btnno(){
  this.no++;
  this.point++;
}

btnvalider(){
 
}

btnsauter(){
  this.s++;
}

points(){
  this.point++;
}
quizz(){
  this.router.navigateByUrl('quizzhistoire');   
  }

  back(){
    this.router.navigateByUrl('listhistoire');
    this.premier=true;
    this.resultat=false;
  }
}
