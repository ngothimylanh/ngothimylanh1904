#include<bits/stdc++.h>
using namespace std;
class DoubleLink
{
	struct NODE
	{
		int Data;
		NODE*Prev,*Next;
	};
    	NODE*First,*Last;
	public:
		DoubleLink()
		{
			First=Last=NULL;
		}
		void View()
		{
			NODE*p=First;
			while(p)
			{
				cout<<p->Data<<"";
				p=p->Next;
			}
			cout<<endl;
		}
		void FirstInsert(int x)
		{
			NODE*p=new(NODE);
			p->Data=x;
			p->Next=p->Prev=NULL;
			if(First==NULL)
			   First=Last=p;
			else
			{
				p->Next=First; 
				First->Prev=p; 
				First=p;
			}
	    }
	    void LastInsert(int x)
	    {
	    	NODE*p=new(NODE);
	    	p->Data=x;
	    	p->Next=p->Prev=NULL;
			if(Last==NULL)
			   First=Last=p;
			else
			{
				p->Prev=Last;
				Last->Next=p;
				Last=p;
			}
		}
		void Insert(int x,NODE*T)
		{
			NODE*p=new(NODE);
			p->Data=x;
			p->Next=T->Next;
			p->Prev=T;
			T->Next->Prev=p;
			T->Next=p;
		}
		NODE *GetNodeN(int n) 
		{
			int i=1;
			NODE *p=First;
			while(p&&i<n)
			{
				i++;
				p=p->Next;
			}
			return p;
		}
		void FirstDel()
		{
			NODE*p=First; 
			if(First==Last)
			   First=Last=NULL;
			else
			{
				First=p->Next;
				First->Prev=NULL;
			}
			delete p; 
		}
		void LastDel()
		{
			NODE*p=Last; 
			if(First==Last)
			   First=Last=NULL;
			else
			{
				Last=p->Prev;
				Last->Next=NULL;
			}
			delete p; 
		}
		void Delete(NODE*T)
		{
		    NODE*p=T->Next;
		    T->Next=p->Next;
			p->Next->Prev=T;
			delete p;
		}
		int Arrmax()
		{
			int m=First->Data;
			NODE*p=First->Next;
			while (p)
			{
				if(m<p->Data)   m=p->Data;
				p=p->Next;
			}
			return m;
		}
};
void Nhap(int&n,DoubleLink&L)
{
	cin>>n;
	for(int i=1;i<=n;i++)
	{
		int x;
		cin>>x;
	    L.LastInsert(x);	
	}
}
int main()
{
	DoubleLink L;
	int n;
	Nhap(n,L);
    cout<<L.Arrmax();
}
