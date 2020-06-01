import { Component, OnInit, Inject } from '@angular/core';
import { LandingPageComponent } from '../landing-page.component'
import { HotelRecord } from '../../Data-Files/hotelrecord'
import { hotelsBooking } from '../../Data-Files/hotelBooking'
import { HotelDataService } from '.././hotel-data.service'
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { ConfirmModelComponent } from './confirm-model/confirm-model.component'
export interface DialogData {
  animal: string;
  name: string;
}

export interface bookingtype {
  userName: string,
  type: string,
  from: string,
  to: string,
  rangeOfPeople: number,
  price : number

}
@Component({
  selector: 'app-show-hotels',
  templateUrl: './show-hotels.component.html',
  styleUrls: ['./show-hotels.component.css']
})
export class ShowHotelsComponent implements OnInit {

  constructor(private _Record: HotelDataService, public showInfo: LandingPageComponent, public dialog: MatDialog) { }
  type: string
  from: string
  to: string
  rangeOfPeople: string
  bookinginfo: bookingtype
  hotelInfoL: hotelsBooking
  ngOnInit(): void {
    this.bookinginfo= this.showInfo.transfer()
    console.log(this.bookinginfo)
  }
  book(){
     this.bookinginfo= this.showInfo.transfer()
    console.log(this.showInfo.transfer())
  }

  openDialog(): void {
    // price = this.showInfo.hotelInfoL.HotelPrice * this.bookinginfo.from
    const dialogRef = this.dialog.open(ConfirmModelComponent, {
      width: '450px',
      data: this.bookinginfo
    });

    dialogRef.afterClosed().subscribe((result:bookingtype) => {
      console.log('The dialog was closed');
      console.log(result)
      this._Record.bookHotel(result.userName,result.type, result.from, result.to, result.rangeOfPeople).subscribe((res) => {
        console.log(res)
      })
    });
  }

}

