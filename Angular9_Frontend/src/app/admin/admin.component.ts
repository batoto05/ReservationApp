import { Component, OnInit } from '@angular/core';
import { hotelsBooking } from '../Data-Files/hotelBooking';
import { AdminService } from './admin.service';
import { Member } from '../Data-Files/account';
import { Booking } from '../Data-Files/booking'
@Component({
  selector: 'app-admin',
  templateUrl: './admin.component.html',
  styleUrls: ['./admin.component.css']
})
export class AdminComponent implements OnInit {

  constructor(public admin:AdminService) { }

  hotelDetails:hotelsBooking;
  memberDetails:Member;
  bookingDetails:Booking;
  ngOnInit(): void {
    this.admin.getHotels()
    .subscribe((res:hotelsBooking) => {
      this.hotelDetails = res
      console.log(this.hotelDetails)
    })

    this.admin.getUsers()
    .subscribe((res:Member) => {
      this.memberDetails = res
      console.log(this.memberDetails)
    })

    this.admin.getBookings()
    .subscribe((res:Booking) => {
      this.bookingDetails = res ;
      console.log(this.bookingDetails)      
    })
  }

  delete(id, table){
    this.admin.deleteRecord(id, table).subscribe((res) => {
      console.log(res)
    })
  }

}
