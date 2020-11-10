import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { CreatequizzPage } from './createquizz.page';

const routes: Routes = [
  {
    path: '',
    component: CreatequizzPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class CreatequizzPageRoutingModule {}
