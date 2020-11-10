import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)
  },
  {
    path: '',
    redirectTo: 'laoder',
    pathMatch: 'full'
  },
  {
    path: 'user',
    loadChildren: () => import('./user/user.module').then( m => m.UserPageModule)
  },
  {
    path: 'listhistoire',
    loadChildren: () => import('./matieres/histoire/list/list.module').then( m => m.ListPageModule)
  },
  {
    path: 'createhistoire',
    loadChildren: () => import('./matieres/histoire/create/create.module').then( m => m.CreatePageModule)
  },
  {
    path: 'quizzhistoire',
    loadChildren: () => import('./matieres/histoire/quizz/quizz.module').then( m => m.QuizzPageModule)
  },
  {
    path: 'list',
    loadChildren: () => import('./matieres/geographie/list/list.module').then( m => m.ListPageModule)
  },
  {
    path: 'create',
    loadChildren: () => import('./matieres/geographie/create/create.module').then( m => m.CreatePageModule)
  },
  {
    path: 'quizz',
    loadChildren: () => import('./matieres/geographie/quizz/quizz.module').then( m => m.QuizzPageModule)
  },
  {
    path: 'laoder',
    loadChildren: () => import('./laoder/laoder.module').then( m => m.LaoderPageModule)
  },
  {
    path: 'menu',
    loadChildren: () => import('./menu/menu.module').then( m => m.MenuPageModule)
  },
  {
    path: 'createlesson',
    loadChildren: () => import('./admin/cours/createlesson/createlesson.module').then( m => m.CreatelessonPageModule)
  },
  {
    path: 'createquizz',
    loadChildren: () => import('./admin/cours/createquizz/createquizz.module').then( m => m.CreatequizzPageModule)
  },
  {
    path: 'score',
    loadChildren: () => import('./score/score.module').then( m => m.ScorePageModule)
  },


];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
