import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { LaoderPage } from './laoder.page';

describe('LaoderPage', () => {
  let component: LaoderPage;
  let fixture: ComponentFixture<LaoderPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ LaoderPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(LaoderPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
