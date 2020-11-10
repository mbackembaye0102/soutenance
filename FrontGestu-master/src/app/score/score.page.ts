import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-score',
  templateUrl: './score.page.html',
  styleUrls: ['./score.page.scss'],
})
export class ScorePage implements OnInit {
passer=0;
lesson=true;
  constructor() { }

  ngOnInit() {
  }
  passe(){
    this.lesson=false;
    this.passer++;
  }

  back(){
    this.lesson=true;
    this.passer--;
  }
}
