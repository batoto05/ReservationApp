import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import {HotelRecord} from '../Data-Files/hotelrecord'
import { Observable } from  'rxjs';

@Injectable({
  providedIn: 'root'
})
export class HotelDataService {

  PHP_API_SERVER = "http://localhost/Php_Backend";
  constructor( private http:HttpClient) { }

  getHotelsRecordInfo()
  {
    return this.http.get(`${this.PHP_API_SERVER}/HotelRecord.php`);
  }
  
  getHotels(type, from, to, rangeOfPeople)
  {
    const obj = {
      type, from, to, rangeOfPeople
    }
    console.log(obj)
    return this.http.post(`${this.PHP_API_SERVER}/hotel-booking-data.php`, obj);
  }

  bookHotel(username, type, from, to, rangeOfPeople){
    const obj = {
      username, type, from, to, rangeOfPeople
    }
    console.log(obj)
    return this.http.post(`${this.PHP_API_SERVER}/addRoom.php`, obj);
  }
}
