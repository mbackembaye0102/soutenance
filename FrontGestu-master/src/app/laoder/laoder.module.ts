import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { LaoderPageRoutingModule } from './laoder-routing.module';

import { LaoderPage } from './laoder.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    LaoderPageRoutingModule
  ],
  declarations: [LaoderPage]
})
export class LaoderPageModule {}
