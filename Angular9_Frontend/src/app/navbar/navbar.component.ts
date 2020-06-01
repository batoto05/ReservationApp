import { Component, OnInit } from '@angular/core';
import {MatSnackBar} from '@angular/material/snack-bar';
import {AccountsService} from './accounts.service'
import {Member} from '../Data-Files/account'

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

  showAccount:boolean = false
  user:Member
  constructor(private _snackBar: MatSnackBar, private _AccountCredentials:AccountsService) { }

  ngOnInit(): void {
    this._AccountCredentials.getSessionUser()
    .subscribe((res:Member) => {
      this.user = res
      console.log(this.user)
    })
  }

  //Snack bar
  openSnackBar() {
    this._snackBar.open("Profile Component is Under Development", "Admin", {
      duration: 2000,
    });
  }

  openMessageBar() {
    this._snackBar.open("Message Component is Under Development", "Admin", {
      duration: 2000,
    });
  }

  //Accounts Details
  addAccount(name,email,password,repassword)
  {
    console.log(name,email,password,repassword)
    if(password === repassword)
    {
      this._AccountCredentials.addMember(name,email,password)
      .subscribe((res: Member) =>
      this.user = res)
      console.log(this.user)
      this.showAccount = true
    }
  }

  getLogin(email, password)
  {
    this._AccountCredentials.getLoginUser(email, password)
    .subscribe((res:Member )=>{
      // var result = JSON.parse(JSON.stringify(res))
      console.log(res)
      this.showAccount = true
      this.user = res
      console.log(this.user)
    })
  }

}
