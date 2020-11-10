import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { CreatequizzPage } from './createquizz.page';

describe('CreatequizzPage', () => {
  let component: CreatequizzPage;
  let fixture: ComponentFixture<CreatequizzPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CreatequizzPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(CreatequizzPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
