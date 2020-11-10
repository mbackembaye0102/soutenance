import { AuthService } from './../service/auth.service';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-user',
  templateUrl: './user.page.html',
  styleUrls: ['./user.page.scss'],
})
export class UserPage implements OnInit {
  public prenom:any;
  // public nom:any;
  // public statut:any;
  constructor(private router :Router, private auth:AuthService) { }

  ngOnInit() {
    this.auth.infos().subscribe(
      res=>{console.log(res);
      this.prenom=res;},
      error=>{
        console.log(error);
      }
    )

  }

  histoire(){
    this.router.navigateByUrl('listhistoire');   
    }

}
