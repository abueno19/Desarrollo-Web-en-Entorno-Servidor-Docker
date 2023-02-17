import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
// import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { ListarContactosComponent } from './listar-contactos/listar-contactos.component';
import { AgregarContactoComponent } from './agregar-contacto/agregar-contacto.component';
import { EditarContactoComponent } from './editar-contacto/editar-contacto.component';
import { MatDialogModule } from '@angular/material/dialog';
import { ContactosService } from './contactos.service';
import { MatIcon, MatIconModule } from '@angular/material/icon';
import { MatTableModule } from '@angular/material/table';

@NgModule({
  declarations: [
    // AppComponent,
    ListarContactosComponent,
    AgregarContactoComponent,
    EditarContactoComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    MatDialogModule,
    MatIconModule,
    MatTableModule
  ],
  providers: [ContactosService],
  // bootstrap: [AppComponent]
})
export class AppModule { }
