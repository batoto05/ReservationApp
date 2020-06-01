import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { PromotionsComponent} from './promotions/promotions.component'
import { LandingPageComponent } from './landing-page/landing-page.component'
import { GalleryComponent } from './gallery/gallery.component'
import { AddHotelComponent } from './add-hotel/add-hotel.component'
import { ShowHotelsComponent } from './landing-page/show-hotels/show-hotels.component'
import { AdminComponent } from './admin/admin.component'

const routes: Routes = [
  {
    path: '',
    redirectTo: 'home',
    pathMatch: 'full'
  },
  {
    path: 'home',
    component: LandingPageComponent,
    children: [
          {
            path: 'hotelsCategory-packages',
            component: ShowHotelsComponent
          }
        ]
  },
  {
    path: 'promotion-packages',
    component: PromotionsComponent
  },
  {
    path: 'gallery',
    component: GalleryComponent
  },
  {
    path: 'addHotel',
    component: AddHotelComponent
  },
  {
    path: 'requireAdminAuth',
    component: AdminComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
