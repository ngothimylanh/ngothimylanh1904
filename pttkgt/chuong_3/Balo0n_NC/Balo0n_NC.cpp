#include<bits/stdc++.h>
#define Max 20

int n;
int m;
int x[Max+1];
int y[Max+1];
int w[Max+1];
int v[Max+1];
int o[Max+1];
int vmax;
int wsel;
int vsel;
int wrem;
int bound;
int wmin;

FILE *fp;
char *finp = "Balo0n_NC.inp"; 
char *fout= "Balo0n_NC.out";

void swap(int*x,int *y);
int init(void);
void SX1();
void SX2();
void Thu(int i);
void Xuat(void);
void GhiNhan();

int main()
{
	if ( !init())
	{
		printf("Khong tim thay tep: %s", finp);
		exit(1);
	}
	SX1();
	bound = vsel + v[1] * wrem/w[1];
	Thu(1);
	SX2();
	Xuat();
}

int init()
{
	int i;
	if ((fp = fopen(finp, "r")) != NULL)
	{
		fscanf(fp, "%d %d \n", &n, &m);
		for (i = 1; i <= n; i++)
		{
			fscanf(fp, "%d", &v[i]);
		}
		fscanf(fp,"\n");
		for (i = 1; i <= n; i++)
		{
			fscanf(fp, "%d", &w[i]);
		}
		fclose(fp);
		for (i = 1; i <= n; i++) x[i]=0;
		v[n+1]=0; 
		w[n+1]=1;
		wrem = m;
		vmax = 0;
		vsel = 0;
		wsel = 0;
		for (i = 1; i <= n; i++) o[i] = i;
		wmin = w[1];
		for (i = 2; i <=n; i++) 
		{
			if (wmin > w[i]) wmin = w[i];
		}
		return 1;
	}
	else return 0;
}

void swap(int*x,int *y)
{
	int e;
	e = *x;
	*x = *y;
	*y = e;
}

void SX1()
{
	int i, j, k;
	for (i=1; i <= n-1; i++)
	{
		k = i;
		for(j = i + 1; j <= n; j++) 
		if ((v[j]/w[j]) > (v[k]/w[k]))	k = j;
		if (k != i)
		{
			swap(&w[i], &w[k]);
			swap(&v[i], &v[k]);
			swap(&o[i], &o[k]);
		}
	}
}

void SX2()
{
	int i, j, k;
	for (i = 1; i <= n - 1; i++)
	{
		k = i;
		for ( j = i + 1; j <= n; j++)
		if (o[j] < o[k]) k = j;
		if (k != i)
		{
			swap(&o[i], &o[k]);
			swap(&y[i], &y[k]);
		}
	}
}

void GhiNhan()
{
	int i;
	if (vmax < vsel)
	{
		vmax = vsel;
		for (i = 1; i <= n; i++) 
			y[i] = x[i];
	}
}

void Thu(int i)
{
	int j;
	for (j = 0; j<= wrem/w[i]; j++)
	{
		bound = vsel+j*v[i]+v[i+1]*(wrem-j*w[i])/w[i+1];
		if (bound >= vmax)
		{
			x[i] = j; 
			vsel = vsel + j*v[i]; 
			wsel = wsel + j*w[i];
			wrem = wrem - j*w[i];
			if (i == n) GhiNhan();
			else  Thu(i+1);
			vsel = vsel - j*v[i]; 
			wsel = wsel - j*w[i];
			wrem = wrem + j*w[i];
		}
	}
}

void Xuat()
{
	int i;
	if ((fp = fopen(fout, "w")) != NULL)
	{
		fprintf(fp, "Gia tri lon nhat: %2d \n", vmax);
		fprintf(fp, "Do vat duoc chon: \n");
		for (i = 1; i <= n; i++) fprintf(fp, "%2d  ", i);
		fprintf(fp, "\n");
		for (i = 1; i <= n; i++)fprintf(fp, "%2d  ", y[i]);
		fclose(fp);
	}
	else printf("Khong tim thay tep: %s", fout);
}


