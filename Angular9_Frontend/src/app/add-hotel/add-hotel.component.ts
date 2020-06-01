import { Component, OnInit } from '@angular/core';
import { HotelService } from './hotel.service'
import { MatSnackBar } from '@angular/material/snack-bar';

@Component({
  selector: 'app-add-hotel',
  templateUrl: './add-hotel.component.html',
  styleUrls: ['./add-hotel.component.css']
})
export class AddHotelComponent implements OnInit {

  constructor(private _AddHotel_Data: HotelService, private _snackBar: MatSnackBar) { }

  ngOnInit(): void {
  }

  addHotel(HotelName, HotelLocation, HotelImage, HotelAppartmentCategory,
    HotelRooms, HotelMessage) {
    this._AddHotel_Data.addHotelImformation(HotelName, HotelLocation, HotelImage, HotelAppartmentCategory,
      HotelRooms, HotelMessage)
  }

  openSnackBar() {
    this._snackBar.open("message", "action", {
      duration: 2000,
    });
  }
}
