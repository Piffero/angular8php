import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

const routes: Routes = [
 {
   path: 'task/create',
   component: TaskAddComponent
 },
 {
   path: 'edit/:id',
   component: TaskEditComponent
 },
 {
   path: 'task',
   component: TaskGetComponent
 }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
