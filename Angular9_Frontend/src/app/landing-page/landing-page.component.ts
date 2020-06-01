import { Component, OnInit } from '@angular/core';
import { HotelDataService } from './hotel-data.service'
import { HotelRecord } from '../Data-Files/hotelrecord'
import { hotelsBooking } from '../Data-Files/hotelBooking'

export interface Record {
  appartments: number,
  villas: number,
  bunglaows: number
}

export interface bookingtype {
  type: any,
  from: any,
  to: any,
  rangeOfPeople: any

}
@Component({
  selector: 'app-landing-page',
  templateUrl: './landing-page.component.html',
  styleUrls: ['./landing-page.component.css']
})
export class LandingPageComponent implements OnInit {

  public showSectionHotelDetails: boolean = true
  constructor(private _Record: HotelDataService) { }
  Hotel_Record: HotelRecord
  hotelInfoL: hotelsBooking
  public type:string
  public from:string
  public to:string
  public rangeOfPeople:string
  bookinginfo: bookingtype
  newObj:any
  ngOnInit(): void {
    this.showSectionHotelDetails = true
    this._Record.getHotelsRecordInfo()
      .subscribe((res: HotelRecord) => {
        this.Hotel_Record = res
        console.log(this.Hotel_Record)
      })
  }

  get(type, from, to, rangeOfPeople) {
    this.showSectionHotelDetails = false
    this.type=type
    this.from=from
    this.to = to
    
    this.newObj = {
      type,
      from,
      to,
      rangeOfPeople
    }
    this._Record.getHotels(type, from, to, rangeOfPeople)
      .subscribe((res: hotelsBooking) => {
        console.log(res)
        this.hotelInfoL = res
      })
  }

  transfer()
  {
    return this.newObj
  }

}
