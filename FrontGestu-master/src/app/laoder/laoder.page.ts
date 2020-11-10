import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-laoder',
  templateUrl: './laoder.page.html',
  styleUrls: ['./laoder.page.scss'],
})
export class LaoderPage implements OnInit {

  constructor(private router :Router,) { }

  ngOnInit() {
  }
  loginpage(){
    this.router.navigateByUrl('home');   
    }
}
