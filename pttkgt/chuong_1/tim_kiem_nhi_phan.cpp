#include<bits/stdc++.h>
using namespace std;
int timkiemnhiphan(int n,int a[],int x,int first,int last)
{
	bool Found=false;
	first=1,last=n;
	while((first<=last)&&(!Found))
	{
		int Mid=last+(first-1)/2;
		if(x<a[Mid])last=Mid-1;
		else
		{
			if(x>a[Mid])     first=Mid+1; 
			else
			{
				Found=true; 
				return Mid; 
			}
		}
	}
	return-1;
}
int main()
{
	int n,a[100001],x,first,last;
	cin>>n;
	for(int i=1;i<=n;i++)
	{
	cin>>a[i];
	}
	cout<<"nhap x:";
	cin>>x;
	if(timkiemnhiphan(n,a,x,first,last)==-1)   cout<<"khong tim thay phan tu"<<x;
	else  cout<<"phan tu"<<x<<"duoc tim thay tai vi tri so"<<timkiemnhiphan(n,a,x,first,last);
}
