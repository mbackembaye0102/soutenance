import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private urllogin:string="http://localhost:8000/login";
  private urlinfos:string="http://localhost:8000/infos";
  constructor(private http:HttpClient,private router:Router) { }
  loggin(data){
    return this.http.post(this.urllogin , data , {observe:'response'})
  }
  enregistrementToken(jwtToken : string){ 
    localStorage.setItem('token',jwtToken);
    this.router.navigate(['/user'])

  }
  getToken(){
    return localStorage.getItem('token');
  }
  infos(){
    return this.http.post(this.urlinfos  , {observe:'response'})
  }
}