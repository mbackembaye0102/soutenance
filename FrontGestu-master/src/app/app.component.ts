import { Component } from '@angular/core';
import { Router } from '@angular/router';

import { Platform } from '@ionic/angular';
import { SplashScreen } from '@ionic-native/splash-screen/ngx';
import { StatusBar } from '@ionic-native/status-bar/ngx';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss']
})
export class AppComponent {
  navigate: any;  
  constructor(
    private platform: Platform,
    private splashScreen: SplashScreen,
    private statusBar: StatusBar,private router :Router
  ) {
    this.initializeApp();
  }

  initializeApp() {
    this.platform.ready().then(() => {
      this.statusBar.styleDefault();
      this.splashScreen.hide();
    });
  }
  home(){
    this.router.navigateByUrl('listhistoire');   
    }
    score(){
      this.router.navigateByUrl('score');   
      }
      logout(){
        this.router.navigateByUrl('home');   
        }
  sideMenu() {  
    this.navigate =   
    [  
        { 
        title : 'Home',
        url   : '/listhistoire',
        icon  : 'apps' 
        },
      { 
        title : 'Seetings',  
        url   : '/listhistoire',  
        icon  : 'book'  
      },   
      
    ];  
  }  
}
