import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { CreatequizzPageRoutingModule } from './createquizz-routing.module';

import { CreatequizzPage } from './createquizz.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    CreatequizzPageRoutingModule
  ],
  declarations: [CreatequizzPage]
})
export class CreatequizzPageModule {}
