#include<bits/stdc++.h>
using namespace std; 
int a[20],d=0;
bool Ok(int x2,int y2)
{
    for(int i=1;i<x2;i++)
    if(a[i]==y2||abs(i-x2)==abs(a[i]-y2))   return false;
    return true;
} 
void Xuat(int n)
{
	d++;
	cout<<d<<":   ";
    for(int i=1;i<=n;i++)   cout<<a[i]<<" ";
    cout<<endl;
} 
void Try(int i,int n)
{
    for(int j=1;j<=n;j++)
	{
        if(Ok(i,j))
		{
            a[i]=j;
            if(i==n)      Xuat(n);
            Try(i+1,n);
        }
    }
}
int main()
{
    int n,k;
    freopen("BT2.inp","r",stdin);
    freopen("BT2.out","w",stdout);
    cin>>n;
    Try(1,n);
    cout<<"so cach xep: "<<d;
}
