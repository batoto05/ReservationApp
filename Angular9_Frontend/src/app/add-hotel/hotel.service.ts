import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'

@Injectable({
  providedIn: 'root'
})
export class HotelService {

  PHP_API_SERVER = "http://localhost/Php_Backend";
  constructor(private http: HttpClient) { }

  addHotelImformation(HotelName, HotelLocation, HotelImage, HotelAppartmentCategory, HotelRooms, HotelMessage) {
    HotelRooms = Number(HotelRooms)
    const hotelObject = {
      HotelName, HotelLocation, HotelImage, HotelAppartmentCategory,
      HotelRooms, HotelMessage,
    }
    console.log(hotelObject)
    this.http.post(`${this.PHP_API_SERVER}/hotel-Service-Add-Details.php`, hotelObject).subscribe(res => {
      console.log(res)
    })
  }



}
