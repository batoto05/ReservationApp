import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import {Member} from '../Data-Files/account';

@Injectable({
  providedIn: 'root'
})
export class AccountsService {

  PHP_API_SERVER = 'http://localhost/Php_Backend';
    constructor(private http: HttpClient) { }

  // httpOptions = { headers: new HttpHeaders({ 'Content-Type': 'application/json', }), responseType: 'text' as 'json' };
  addMember(MemberName, MemberEmail, MemberPassword) {
    const memberAccountDetails = {
      MemberName,
      MemberEmail,
      MemberPassword
    };
    console.log(memberAccountDetails);
    return this.http.post(`${this.PHP_API_SERVER}/accounts-service.php`, memberAccountDetails);
  }

  getLoginUser(MemberEmail, MemberPassword):Observable<Member>
  {
    const memberAccountDetails = {
      MemberEmail,
      MemberPassword
    };
    console.log(memberAccountDetails);
    return this.http.post<Member>(`${this.PHP_API_SERVER}/Account-Service-login.php`, memberAccountDetails);
  }

  getSessionUser(){
    return this.http.get(`${this.PHP_API_SERVER}/sesseion-get.php`);
  }
}
