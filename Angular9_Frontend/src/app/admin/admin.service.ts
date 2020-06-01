import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import {HotelRecord} from '../Data-Files/hotelrecord'
import { Observable } from  'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AdminService {

  PHP_API_SERVER = "http://localhost/Php_Backend";
  constructor( private http:HttpClient) { }
  
  getHotels()
  {
      return this.http.get(`${this.PHP_API_SERVER}/getHotels.php`)
  }

  getUsers()
  {
      return this.http.get(`${this.PHP_API_SERVER}/getUsers.php`)
  }

  getBookings()
  {
      return this.http.get(`${this.PHP_API_SERVER}/getBookings.php`)
  }

  deleteRecord(id, table){
    console.log(id, table)
    const obj ={
      id, table
    }
    return this.http.post(`${this.PHP_API_SERVER}/deletePanel.php`,obj)
  }
}
